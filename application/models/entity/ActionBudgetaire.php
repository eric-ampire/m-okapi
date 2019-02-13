<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 00:42
 */

class ActionBudgetaire
{
    private $id;
    private $idSortie;
    private $montantUtilse;
    private $motif;
    private $dateCreation;

    /**
     * ActionBudgetaire constructor.
     * @param $id
     * @param $idSortie
     * @param $montantUtilse
     * @param $motif
     * @param $dateCreation
     */
    public function __construct($id, $idSortie, $montantUtilse, $motif, $dateCreation)
    {
        $this->id = $id;
        $this->idSortie = $idSortie;
        $this->montantUtilse = $montantUtilse;
        $this->motif = $motif;
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
    public function getIdSortie()
    {
        return $this->idSortie;
    }

    /**
     * @param mixed $idSortie
     */
    public function setIdSortie($idSortie)
    {
        $this->idSortie = $idSortie;
    }

    /**
     * @return mixed
     */
    public function getMontantUtilse()
    {
        return $this->montantUtilse;
    }

    /**
     * @param mixed $montantUtilse
     */
    public function setMontantUtilse($montantUtilse)
    {
        $this->montantUtilse = $montantUtilse;
    }

    /**
     * @return mixed
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * @param mixed $motif
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;
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