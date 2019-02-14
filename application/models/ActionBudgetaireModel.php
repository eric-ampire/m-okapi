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

    public function add($data) {

        $this->db->insert($this->tableName, $data);
    }

    public function getAll() {
        $this->db->select("*");
        $this->db->from($this->tableName);

        return $this->db->get()->result();
    }

    public function getOne($id) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('id', $id);

        $res = $this->db->get()->result();
        if (count($res) > 0) {
            return $res[0];
        } else {
            return null;
        }
    }

    public function getAction($id) {
        $res = $this->db->query("SELECT * FROM 
        action_budgetaire WHERE id_sortie IN (
            SELECT id FROM sortie WHERE id_categorie_sortie IN (
                SELECT id FROM categorie_sortie WHERE id_utilisateur IN (
                    SELECT id FROM utilisateur WHERE id = " . $id . "
                )
            )
        )");

        return $res->result();
    }
}