<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Form_valide extends Ci_Controller{

    public function verification(){

        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomcomplet','Nomcomplet','required','max_length[2]',
            array(
                'required' => 'Ce champ est obligatoire',
                'max_length' => 'les caracteres surpasses le delai'
            
            ));
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('utilisateur\form_inscription');
            
            
        }
        else{
            
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
            
            $this->load->view('utilisateur\inscription_success');

        }
    }
}