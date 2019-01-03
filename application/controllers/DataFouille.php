<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataFuille extends CI_Controller
{
    public function datafouille($data,$identifiant){

        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT $data FROM exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            echo $s->$data;
        }
    }

}