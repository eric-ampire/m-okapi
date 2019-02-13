<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 00:48
 */

class Sortie
{
    private $id;
    private $idCategorieSortie;
    private $idExerciceBudgetaire;
    private $seuil;

    /**
     * Sortie constructor.
     * @param $id
     * @param $idCategorieSortie
     * @param $idExerciceBudgetaire
     * @param $seuil
     */
    public function __construct($id, $idCategorieSortie, $idExerciceBudgetaire, $seuil)
    {
        $this->id = $id;
        $this->idCategorieSortie = $idCategorieSortie;
        $this->idExerciceBudgetaire = $idExerciceBudgetaire;
        $this->seuil = $seuil;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdCategorieSortie()
    {
        return $this->idCategorieSortie;
    }

    /**
     * @param mixed $idCategorieSortie
     */
    public function setIdCategorieSortie($idCategorieSortie)
    {
        $this->idCategorieSortie = $idCategorieSortie;
    }

    /**
     * @return mixed
     */
    public function getIdExerciceBudgetaire()
    {
        return $this->idExerciceBudgetaire;
    }

    /**
     * @param mixed $idExerciceBudgetaire
     */
    public function setIdExerciceBudgetaire($idExerciceBudgetaire)
    {
        $this->idExerciceBudgetaire = $idExerciceBudgetaire;
    }

    /**
     * @return mixed
     */
    public function getSeuil()
    {
        return $this->seuil;
    }

    /**
     * @param mixed $seuil
     */
    public function setSeuil($seuil)
    {
        $this->seuil = $seuil;
    }

    /**
     * Sortie constructor.
     * @param $id
     * @param $idCategorieSortie
     * @param $idExercie
     */


}