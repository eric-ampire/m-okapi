<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 01:06
 */

class SortieModel extends CI_Model
{
    private $tableName= 'sortie';

    function add($sortie) {

        $data = array(
            "id" => null,
            'id_categorie_sortie'=> $sortie['id_categorie_sortie'],
            'id_exercice_budgetaire' => $sortie['id_exercice_budgetaire'],
            'seuil' => $sortie['seuil']
        );

        $this->db->insert($this->tableName, $data);
    }

    function getOne($id) {
        $this->db->select("*");
        $this->db->from($this->tableName);
        $this->db->where("id", $id);

        $res = $this->db->get()->result();

        if (count($res) > 0) {
            return $res[0];
        }
        return  null;
    }

    function getAll() {
        $this->db->select("*");
        $this->db->form($this->tableName);

        return $this->db->get()->result();
    }

    function update($data, $idSortie) {
        $this->db->set("seuil", $data['seuil']);
        $this->db->where("id", $idSortie);
        $this->db->update($this->tableName);
    }
}