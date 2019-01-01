<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurModel extends CI_Model
{
    public $table = 'utilisateur';
    public $nouvel_ex = 'exercice_budgetaire';
    public $nouvelle_categorie_entree = 'entree';

    public function creer_utilisateur($infos)
    {
        $this->db->insert($this->table, $infos);
    }

    public function nouvel_exercice($infos)
    {
        $this->db->insert($this->nouvel_ex, $infos);
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
}