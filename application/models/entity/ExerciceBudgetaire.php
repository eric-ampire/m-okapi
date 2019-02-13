<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 00:44
 */

class ExerciceBudgetaire
{
    private $id;
    private $idUtilisateur;
    private $dateDebut;
    private $dateFin;
    private $budgetIntial;
    private $dateCreation;

    /**
     * ExerciceBudgetaire constructor.
     * @param $id
     * @param $idUtilisateur
     * @param $dateDebut
     * @param $dateFin
     * @param $budgetIntial
     * @param $dateCreation
     */
    public function __construct($id, $idUtilisateur, $dateDebut, $dateFin, $budgetIntial, $dateCreation)
    {
        $this->id = $id;
        $this->idUtilisateur = $idUtilisateur;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->budgetIntial = $budgetIntial;
        $this->dateCreation = $dateCreation;
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
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param mixed $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getBudgetIntial()
    {
        return $this->budgetIntial;
    }

    /**
     * @param mixed $budgetIntial
     */
    public function setBudgetIntial($budgetIntial)
    {
        $this->budgetIntial = $budgetIntial;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }


}