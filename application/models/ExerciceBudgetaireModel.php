<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 01:27
 */

class ExerciceBudgetaireModel extends CI_Model
{
    private $tableName = 'exercice_budgetaire';

    public function add($data) {
        $this->db->insert($this->tableName, $data);
    }

    function getByUser($idUser) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->order_by("date_creation", 'desc');
        $this->db->where("id_utilisateur", $idUser);

        $result = $this->db->get()->result();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    function updateByIdUser($idUser, $data) {

        $this->db->set("budget_initial", $data['budget_initial']);
        $this->db->where('id_utilisateur', $idUser);
        $this->db->update($this->tableName);
    }
}