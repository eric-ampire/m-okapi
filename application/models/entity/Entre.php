<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 00:43
 */

class Entre
{
    private $id;
    private $idUtilisateur;
    private $nom;
    private $montant;
    private $dateEntre;

    /**
     * Entre constructor.
     * @param $id
     * @param $idUtilisateur
     * @param $nom
     * @param $montant
     * @param $dateEntre
     */
    public function __construct($id, $idUtilisateur, $nom, $montant, $dateEntre)
    {
        $this->id = $id;
        $this->idUtilisateur = $idUtilisateur;
        $this->nom = $nom;
        $this->montant = $montant;
        $this->dateEntre = $dateEntre;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getDateEntre()
    {
        return $this->dateEntre;
    }

    /**
     * @param mixed $dateEntre
     */
    public function setDateEntre($dateEntre)
    {
        $this->dateEntre = $dateEntre;
    }


}