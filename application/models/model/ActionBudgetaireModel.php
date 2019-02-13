<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 00:37
 */

class ActionBudgetaireModel extends CI_Model
{
    private $tableName = 'action_budgetaire';

    function add(ActionBudgetaire $budgetaire) {
        $data = array(
            'id'=> $budgetaire->getId(),
            'date_creation' => $budgetaire->getDateCreation(),
            "id_sortie" => $budgetaire->getIdSortie(),
            'motif' => $budgetaire->getMotif(),
            'montant_utilise'=> $budgetaire->getMontantUtilse()
        );

        $this->db->insert($this->tableName, $data);
    }

    function getAll() {
        $this->db->select("*");
        $this->db->from($this->tableName);

        return $this->db->get()->result();
    }
}