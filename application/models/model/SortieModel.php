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

    function add(Sortie $sortie) {
        $sortie->getId();
        $sortie->getIdCategorieSortie();
        $sortie->getIdExerciceBudgetaire();
        $sortie->getSeuil();

        $data = array(
            "id" => $sortie->getId(),
            'id_categorie_sortie'=> $sortie->getIdCategorieSortie(),
            'id_exercice_budgetaire' => $sortie->getIdExerciceBudgetaire(),
            'seuil' => $sortie->getSeuil()
        );

        $this->db->insert($this->tableName, $data);
    }

    function getOne($id) {
        $this->db->select("*");
        $this->db->form($this->tableName);
        $this->where("id", $id);

        return $this->db->get()->result();
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