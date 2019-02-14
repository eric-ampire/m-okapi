<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 01:47
 */

class CategorieSortieModel extends CI_Model
{
    private $tableName = 'categorie_sortie';

    public function add($data) {
        $this->db->insert($this->tableName, $data);
    }

    function getByUser($idUser) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where("id_utilisateur", $idUser);

        $result = $this->db->get()->result();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
}