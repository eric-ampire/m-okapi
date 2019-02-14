<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{
    
    public function form_inscription()
    {
        $this->load->view('utilisateur/form_inscription');
    }

    public function form_authentification()
    {
        $this->load->view('utilisateur/form_authentification');
    }

    public function nouvel_utilisateur()
    {
        $nomcomplet = $this->input->post('nomcomplet');
        $email = $this->input->post('email');
        $login = $this->input->post('login');
        $mdp = $this->input->post('mdp');
        $mdpconf = $this->input->post('mdpconf');

        $this->form_validation->set_rules('nomcomplet', 'email', 'required|min_length[3]', array('required'=>'Le nom est obligatoire', 'min_length'=> 'Votre %s devra avoir au moins 3 caractères'));
        $this->form_validation->set_rules('email', 'Adresse mail', 'required|valid_email', array('required'=>'L\'adresse mail est obligatoire', 'valid_email'=> 'Votre %s n\'est pas valide'));
        $this->form_validation->set_rules('login', 'Logiin', 'required', array('required'=>'Le login est obligatoire'));
        $this->form_validation->set_rules('mdp', 'Mot de passe', 'required|min_length[6]', array('required'=>'Le mot de passe est obligatoire', "min_length" => "Le %s doit avoir au moins 6 caracteres"));
        $this->form_validation->set_rules('mdpconf', 'Confirmation', 'required|min_length[6]', array('required'=>'La confirmation du mot de passe est obligatoire', 'min_length'=> 'Votre %s devra avoir au moins 6 caractères'));

        if ($this->form_validation->run()) {
            if ($mdp == $mdpconf) {
                $data = array(
                    'nomcomplet' => $nomcomplet,
                    'email' => $email,
                    'login' => $login,
                    'mdp' => $mdp,
                    'etat' => FALSE
                );

                $this->load->model('UtilisateurModel');
                $this->UtilisateurModel->creer_utilisateur($data);
                $this->load->view('utilisateur/inscription_success');
            } else {
                $data = array('password_message' => 'Le mots de passe ne correpond pas');
                $this->load->view("utilisateur/form_inscription", $data);
            }

        } else {
            $this->load->view("utilisateur/form_inscription");
        }
    }

    public function connexion()
    {
        $login = $this->input->post('login');
        $mdp = $this->input->post('mdp');
        $d = array(
            'login' => $login,
            'mdp' => $mdp
        );

        $this->load->model('UtilisateurModel');
        $r = $this->UtilisateurModel->check_authentification($d);

        if(count($r) > 0)
        {
            $user = $r[0];
            $d = array(
                'id' => $user->id,
                'nomcomplet' => $user->nomcomplet,
                'is_connected' => true
            );
            $this->session->set_userdata($d);
            redirect('utilisateur/accueil');
        }
        else
        {
            $d = array(
                'error_login' => 'Login ou mot de passe incorrect'
            );
            $this->session->set_flashdata($d);
            $this->form_authentification();
        }
    }

    public function accueil()
    {
        if(!$this->session->is_connected) redirect("utilisateur/connexion");

        $entres = $this->entre_model->getByUser($this->session->id);
        $exercice_budgetaires = $this->exercices_budgetaire_model->getByUser($this->session->id);
        $action_budgetaires = $this->action_budgetaire_model->getAction($this->session->id);


        $data = array(
            'entres' => $entres,
            'exercice_budgetaires' => $exercice_budgetaires,
            'action_budgetaires' => $action_budgetaires
        );

        $preferences = array(
            'start_day' => 'sunday',
            'month_type' => 'long',
            'day_type' => 'short'
        );
        $this->load->library('calendar', $preferences);
        $this->load->view('utilisateur/accueil', $data);
    }

    public function deconnexion()
    {
        $this->session->unset_userdata('is_connected');
        redirect();
    }

    public function menu()
    {
        $this->load->view('utilisateur/menu');
    }

    public function exercices_budgetaire()
    {
        $this->load->view('exercices/nouv_exercices');
    }

    public function parametre()
    {
        $this->load->view('utilisateur/parametre');
    }

    public function cont_parametre()
    {
        $this->load->view('utilisateur/cont_parametre');
    }

    public function entree()
    {
        $this->load->view('entree/new_entree');
    }

    public function categorie_sortie()
    {
        # recuperation categorie sortie
        # recuperation exercice budgetaire


        $this->load->view('categorie_sortie/new_sortie');
    }

    public function action_budgetaire()
    {
        $this->load->view('action budgetaire/new_action');
    }

    public function sortie()
    {
        $exo_budgetaire = $this->exercices_budgetaire_model->getByUser($this->session->id);
        $cat_sortie     = $this->categorie_sortie_model->getByUser($this->session->id);

        $data = array(
            'exo_budgetaire' => $exo_budgetaire,
            'cat_sortie' => $cat_sortie
        );

        $this->load->view('sortie/sortie', $data);
    }
    
    public function evolution()
    {
        $entres = $this->entre_model->getByUser($this->session->id);
        $exercice_budgetaires = $this->exercices_budgetaire_model->getByUser($this->session->id);
        $action_budgetaires = $this->action_budgetaire_model->getAction($this->session->id);
        $categories = $this->categorie_sortie_model->getByUser($this->session->id);


        $data = array(
            'entres' => $entres,
            'exercice_budgetaires' => $exercice_budgetaires,
            'action_budgetaires' => $action_budgetaires,
            'categories' => $categories
        );
        $this->load->view('rapport/evolution', $data);
    }

    public function parametre_compte()
    {
        $this->load->view('utilisateur/parametre_compte');
    }

    public function creation_exercicesB()
    {
        $budget = $this->input->post('budgetI');
        $dtcreation = $this->input->post('dtcreation');
        $dtdebut = $this->input->post('dtdebut');
        $dtfin = $this->input->post('dtfin');

        $this->form_validation->set_rules('budgetI', 'Budget init', 'required', array('required'=>"C'est champ est obligatoire"));
        $this->form_validation->set_rules('dtcreation', 'Adresse mail', 'required', array('required'=>"C'est champ est obligatoire"));
        $this->form_validation->set_rules('dtdebut', 'Date debut', 'required', array('required'=>"C'est champ est obligatoire"));
        $this->form_validation->set_rules('dtfin', 'Date fin', 'required', array('required'=>"C'est champ est obligatoire"));

        if ($this->form_validation->run()) {
            $data = array(
                'budget_initial' => $budget,
                'date_creation' => $dtcreation,
                'date_debut' => $dtdebut,
                'date_fin' => $dtfin,
                'id_utilisateur' => $this->session->id
            );

            $this->exercices_budgetaire_model->add($data);

            $this->load->view('exercices/success');
        } else {
            $this->load->view('exercices/success');
        }
    }

    public function nouvelle_entree()
    {
        $nom = $this->input->post('nom');
        $montant = $this->input->post('montant');
        $dtcreation = $this->input->post('dtcreation');

        $this->form_validation->set_rules('nom', "Nom", 'required', array('required' => "C'est champs est obligatoire"));
        $this->form_validation->set_rules('montant', "montant", 'required', array('required' => "C'est champs est obligatoire"));
        $this->form_validation->set_rules('dtcreation', "dtcreation", 'required', array('required' => "C'est champs est obligatoire"));

        if ($this->form_validation->run()) {
            $data = array(
                'id_utilisateur' => $this->session->id,
                'nom' => $nom,
                'montant' => $montant,
                'date_entree' => $dtcreation
            );

            $this->entre_model->add($data);
            $this->load->view('entree/success');
        } else {
            $this->load->view('new_entree/success');
        }
    }

    public function nouvelle_categorie_sortie()
    {
        $nom = $this->input->post('nom');
        $this->form_validation->set_rules('nom', "Nom", 'required', array('required' => "C'est champs est obligatoire"));

        if ($this->form_validation->run()) {
            $data = array(
                'id_utilisateur' => $this->session->id,
                'nom' => $nom
            );

            $this->categorie_sortie_model->add($data);
            $this->load->view('categorie_sortie/success');

        } else {
            $this->load->view('categorie_sortie/new_sortie');
        }
    }

    public function nouvelle_sortie()
    {

        $categorie_sortie_id = $this->input->post('categorie_sortie');
        $exercice_budgetaire_id = $this->input->post('exercice_budgetaire');
        $seuil = $this->input->post('seuil');

        $this->form_validation->set_rules('seuil', "seuil", 'required', array('required' => "C'est champs est obligatoire"));

        if ($this->form_validation->run()) {
            $exercice_budgetaire = $this->exercices_budgetaire_model->getByUser($this->session->id);
            if ($exercice_budgetaire == null) return;

            # controles seuil
            if($seuil > $exercice_budgetaire[0]->budget_initial || $seuil < 0 || $seuil == 0)
            {
                echo "la valeur du seuil doit etre non nulle, superieur a '0' et inferieur au budget initial</br>";
                echo "<a href=".site_url('utilisateur/sortie').">Ressayer</a>";
            }
            else if(empty($seuil))
            {
                echo "Entrer une valeur du seuil";
                echo "<a href=".site_url('utilisateur/sortie').">Ressayer</a>";
            }
            else
            {
                $data = array(
                    'id_categorie_sortie' => $categorie_sortie_id,
                    'id_exercice_budgetaire' => $exercice_budgetaire_id,
                    'seuil' => $seuil
                );

                $this->sortie_model->add($data);
                $this->load->view('sortie/success');
            }

        } else {
            $this->load->view('sortie/new_sortie');
        }
    }

    public function nouvelle_action_budgetaire()
    {
        $id_sortie = $this->input->post('id_sortie');
        $montant= $this->input->post('montant');
        $motif = $this->input->post('motif');
        $dtcreation = $this->input->post('dtcreation');

        $this->form_validation->set_rules("montant","Montant", "required", array('required' => "C'est champ est obligatoire"));
        $this->form_validation->set_rules("motif","motif", "required", array('required' => "C'est champ est obligatoire"));
        $this->form_validation->set_rules("dtcreation","dtcreation", "required", array('required' => "C'est champ est obligatoire"));

        if ($this->form_validation->run()) {

            $sortie = $this->sortie_model->getOne($id_sortie);

            if($montant > $sortie->seuil)
            {
                echo "Le montant depasse la valeur du seuil</br>";
                echo "Veuillez entrer unn valeur non nulle et inferieure au seuil</br>";
                echo "<a href=".site_url('utilisateur/action_budgetaire').">Ressayer</a></br>";
                echo "<a href=".site_url('utilisateur/accueil').">Annuler</a></br>";
            }
            else if($montant <=0)
            {
                echo "Le montant est nulle</br>";
                echo "Veuillez entrer unn valeur non nulle et inferieure au seuil</br>";
                echo "<a href=".site_url('utilisateur/action_budgetaire').">Ressayer</a></br>";
                echo "<a href=".site_url('utilisateur/accueil').">Annuler</a></br>";
            }
            else {

                # mise a jour du seul
                $newSeuil = $sortie->seuil - $montant;
                $this->sortie_model->update(array("seuil" => $newSeuil), $id_sortie);


                # mise a jour exercice budgetaire
                $exercice_budgetaire = $this->exercices_budgetaire_model->getByUser($this->session->id);
                if ($exercice_budgetaire == null) return;
                $newBudget = $exercice_budgetaire[0]->budget_initial - $montant;

                $this->exercices_budgetaire_model->updateByIdUser(
                    $this->session->id,
                    array('budget_initial'=> $newBudget)
                );

                # mise a jour action budgetaire
                $data = array(
                    'id_sortie' => $id_sortie,
                    'montant_utilise' => $montant,
                    'motif' => $motif,
                    'date_creation' => $dtcreation
                );

                $this->action_budgetaire_model->add($data);
                $this->load->view('action budgetaire/success');
            }
        }
    }

    public function update_login()
    {
        $data = $this->input->post('login');
        $this->load->model('UtilisateurModel');
        $this->UtilisateurModel->modifier_login(array("login" => $data), $this->session->id);
        echo "Le login a etait modifier avec succes !!";
        echo  anchor("utilisateur/menu", "Menu");
    }

    public function update_mdp()
    {
        $new_password = $this->input->post('new_mdp');
        $confirm_password = $this->input->post('confirm_mdp');
        $old_password = $this->input->post('old_mdp');

        $this->form_validation->set_rules("old_mdp","motif", "trim|required|min_length[6]", array('required' => "C'est champ est obligatoire", "min_length" => "Le mot de passe doit avoir au moins 6 caracteres"));
        $this->form_validation->set_rules("new_mdp","Montant", "trim|required|min_length[6]", array('required' => "C'est champ est obligatoire", "min_length" => "Le mot de passe doit avoir au moins 6 caracteres"));
        $this->form_validation->set_rules("confirm_mdp","motif", "trim|required|min_length[6]", array('required' => "C'est champ est obligatoire", "min_length" => "Le mot de passe doit avoir au moins 6 caracteres"));



        if ($this->form_validation->run()) {

            $utilisateur = $this->utilisateur_model->getUser($this->session->id);
            if ($utilisateur == null) return;

            if ($new_password == $confirm_password AND $utilisateur->mdp == $old_password) {

                $data = array("mdp" => $new_password);
                $this->utilisateur_model->modifier_mdp($data, $this->session->id);

                $data = array('password_error' => 'Le mot de passe a etait modifier avec succes');
                $this->load->view("utilisateur/conf_mod_mdp", $data);

            } else {
                $data = array('password_error' => 'Le mots de passe ne correpond pas');
                $this->load->view("utilisateur/conf_mod_mdp", $data);
            }
        } else {
            $this->load->view("utilisateur/conf_mod_mdp");
        }
    }

    public function demande_login()
    {
        $this->load->view('utilisateur/conf_mod_login');
    }

    public function demande_mdp()
    {
        $this->load->view('utilisateur/conf_mod_mdp');
    }
}