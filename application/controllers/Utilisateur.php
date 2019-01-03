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

        $data = array(
        'id_categorie_sortie' => $categorie_sortie,
        'id_exercice_budgetaire' => $exercice_budgetaire,
        'seuil' => $seuil
        );

        $this->load->model('UtilisateurModel');
        $this->UtilisateurModel->nouvelle_sortie($data);

        $this->load->view('sortie/success');
    }

    public function nouvelle_action_budgetaire()
    {
        $id_sortie = $this->input->post('id_sortie');
        $montant= $this->input->post('montant');
        $motif = $this->input->post('motif');
        $dtcreation = $this->input->post('dtcreation');

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