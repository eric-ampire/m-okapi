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
        if($this->session->is_connected)
        {
            $preferences = array(
                'start_day' => 'sunday',
                'month_type' => 'long',
                'day_type' => 'short'
            );
            $this->load->library('calendar',$preferences);
            $this->load->view('utilisateur/accueil');
        }
        else
        {
            redirect();
        }
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

    public function categorie_entree()
    {
        $this->load->view('categorie entree/new_entree');
    }

    public function categorie_sortie()
    {
        $this->load->view('categorie sortie/new_sortie');
    }

    public function action_budgetaire()
    {
        $this->load->view('action budgetaire/new_action');
    }

    public function sortie()
    {
        $this->load->view('sortie/sortie');
    }
    
    public function evolution()
    {
        $this->load->view('rapport/evolution');
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
        
        $data = array(
            'budget_initial' => $budget,
            'date_creation' => $dtcreation,
            'date_debut' => $dtdebut,
            'date_fin' => $dtfin,
            'id_utilisateur' => $this->session->id
        );
        
            $this->load->model('UtilisateurModel');
            $this->UtilisateurModel->nouvel_exercice($data);
        
            $this->load->view('exercices/success');
    }

    public function nouvelle_categorie_entree()
    {
        $nom = $this->input->post('nom');
        $montant = $this->input->post('montant');
        $dtcreation = $this->input->post('dtcreation');

        $data = array(
            'id_utilisateur' => $this->session->id,
            'nom' => $nom,
            'montant' => $montant,
            'date_entree' => $dtcreation
        );

        $this->load->model('UtilisateurModel');
        $this->UtilisateurModel->nouvelle_categorie_entree($data);

        $this->load->view('categorie entree/success');
    }

    public function nouvelle_categorie_sortie()
    {
        $nom = $this->input->post('nom');

        $data = array(
            'id_utilisateur' => $this->session->id,
            'nom' => $nom
        );

        $this->load->model('UtilisateurModel');
        $this->UtilisateurModel->nouvelle_categorire_sortie($data);

        $this->load->view('categorie sortie/success');
    }

    public function nouvelle_sortie()
    {
        $categorie_sortie = $this->input->post('categorie_sortie');
        $exercice_budgetaire = $this->input->post('exercice_budgetaire');
        $seuil = $this->input->post('seuil');

        //controles seuil 
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT budget_initial FROM 
        exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $c = $s->budget_initial;
        }
        $budget = $c;
        if($seuil > $budget || $seuil < 0 || $seuil == 0)
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
                'id_categorie_sortie' => $categorie_sortie,
                'id_exercice_budgetaire' => $exercice_budgetaire,
                'seuil' => $seuil
                );
        
                $this->load->model('UtilisateurModel');
                $this->UtilisateurModel->nouvelle_sortie($data);
        
                $this->load->view('sortie/success');
        }
    }

    public function nouvelle_action_budgetaire()
    {
        $identifiant = $this->session->id;
        $id_sortie = $this->input->post('id_sortie');
        $montant= $this->input->post('montant');
        $motif = $this->input->post('motif');
        $dtcreation = $this->input->post('dtcreation');
        
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT seuil FROM sortie WHERE
        id = :id_sortie';
        $req = $db->prepare($str);
        $val = array(
            'id_sortie' => $id_sortie
        );
        $req->execute($val);
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $seuil = $s->seuil;
        }
        $seuil = $seuil;

        if($montant > $seuil)
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
        else{
            
            $db = new PDO('mysql:host=localhost;dbname=mokapi', 'root', '');
            $rq = 'UPDATE sortie SET seuil = :seuil WHERE 
            id = :id_sortie';
            $v = array(
                'id_sortie' => $id_sortie,
                'seuil' => $seuil - $montant
            );
            $res = $db->prepare($rq);
            $res->execute($v);
            
            $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
            $str = 'SELECT budget_initial FROM exercice_budgetaire WHERE
            id_utilisateur = :id_utilisateur';
            $req = $db->prepare($str);
            $val = array(
                'id_utilisateur' => $identifiant,
            );
            $req->execute($val);
            $solde = 0;
            while($s = $req->fetch(PDO::FETCH_OBJ))
            {
                $c = $s->budget_initial;
            }
    
            $new_budget = $c - $montant;
    
            $db = new PDO('mysql:host=localhost;dbname=mokapi', 'root', '');
            $rq = 'UPDATE exercice_budgetaire SET budget_initial = :budget_initial WHERE 
            id_utilisateur = :id_utilisateur';
            $v = array(
                'id_utilisateur' => $identifiant,
                'budget_initial' => $new_budget
            );
            $res = $db->prepare($rq);
            $res->execute($v);
    
            $data = array(
                'id_sortie' => $id_sortie,
                'montant_utilise' => $montant,
                'motif' => $motif,
                'date_creation' => $dtcreation
            );
    
            $this->load->model('UtilisateurModel');
            $this->UtilisateurModel->action_budgetaire($data);
    
            $this->load->view('action budgetaire/success');
        }


        
    }

    public function update_login()
    {
        $data = $this->input->post('login');
        $this->load->model('UtilisateurModel');
        $this->UtilisateurModel->modifier_login($data);   
    }

    public function update_mdp()
    {
        $data = $this->input->post('mdp');
        $this->load->model('UtilisateurModel');
        $this->UtilisateurModel->modifier_mdp($data);
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