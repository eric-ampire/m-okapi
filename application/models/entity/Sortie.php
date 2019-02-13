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
    private $idExercie;

    /**
     * Sortie constructor.
     * @param $id
     * @param $idCategorieSortie
     * @param $idExercie
     */
    public function __construct($id, $idCategorieSortie, $idExercie)
    {
        $this->id = $id;
        $this->idCategorieSortie = $idCategorieSortie;
        $this->idExercie = $idExercie;
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
    public function getIdExercie()
    {
        return $this->idExercie;
    }

    /**
     * @param mixed $idExercie
     */
    public function setIdExercie($idExercie)
    {
        $this->idExercie = $idExercie;
    }


}