<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurModel extends CI_Model
{
    public $table = 'utilisateur';
    public $nouvel_ex = 'exercice_budgetaire';
    public $nouvelle_categorie_entree = 'entree';
    public $nouvelle_categorie_sortie = 'categorie_sortie';
    public $action_budgetaire = 'action_budgetaire';
    public $nouvelle_sortie = 'sortie'; 

    public function creer_utilisateur($infos)
    {
        $this->db->insert($this->table, $infos);
    }

    public function nouvel_exercice($infos)
    {
        $this->db->insert($this->nouvel_ex, $infos);
    }

    public function action_budgetaire($infos)
    {
        $this->db->insert($this->action_budgetaire, $infos);
    }

    public function check_authentification($data)
    {
        $this->db->where($data);
        $q = $this->db->get($this->table);
        $res = $q->result();
        return  $res;
    }

    public function chek_budget($identifiant){
        $this->db->where($identifiant);
        $q = $this->db->simple_query('SELECT budget_initial FROM exercice_budgetaire WHERE id = $identifiant' );
        $res = $q->result();
        return  $res;
    }

    public function nouvelle_categorie_entree($data)
    {
        $this->db->insert($this->nouvelle_categorie_entree, $data);
    }

    public function nouvelle_categorire_sortie($data)
    {
        $this->db->insert($this->nouvelle_categorie_sortie, $data);
    }

    public function nouvelle_sortie($data)
    {
        $this->db->insert($this->nouvelle_sortie, $data);
    }

    public function modifier_login($data)
    {
        $db = new PDO('mysql:host=localhost;dbname=mokapi', 'root', '');
        $rq = 'UPDATE utilisateur SET login = :login WHERE 
        id = :id';
        $v = array(
            'login' => $data,
            'id' => $this->session->id
        );
        $res = $db->prepare($rq);
        $res->execute($v);

        $this->load->view('sortie/success');
    }

    public function modifier_mdp($data)
    {
        $db = new PDO('mysql:host=localhost;dbname=mokapi', 'root', '');
        $rq = 'UPDATE utilisateur SET mdp = :mdp WHERE 
        id = :id';
        $v = array(
            'mdp' => $data,
            'id' => $this->session->id
        );
        $res = $db->prepare($rq);
        $res->execute($v);

        $this->load->view('sortie/success');
    }
}