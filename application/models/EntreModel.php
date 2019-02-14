<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 02:59
 */

class EntreModel extends CI_Model
{
    private $tableName = 'entree';

    public function add($data) {
        $this->db->insert($this->tableName, $data);
    }

    public function getByUser($id) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('id_utilisateur', $id);

        $res = $this->db->get()->result();
        if (count($res) > 0) {
            return $res;
        } else {
            return array();
        }
    }
}