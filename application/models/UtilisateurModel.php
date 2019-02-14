<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurModel extends CI_Model
{
    private $table = 'utilisateur';

    public function creer_utilisateur($infos)
    {
        $this->db->insert($this->table, $infos);
    }

    public function getUser($id)
    {
        $this->db->from($this->table);
        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->get()->result();

        if (count($res) > 0) {
            return $res[0];
        }
        return  null;
    }

    public function check_authentification($data)
    {
        $this->db->where($data);
        $q = $this->db->get($this->table);
        $res = $q->result();
        return  $res;
    }

    public function modifier_login($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->set('login', $data['login']);
        $this->db->update("utilisateur");
    }

    public function modifier_mdp($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->set('mdp', $data['mdp']);
        $this->db->update("utilisateur");
    }
}