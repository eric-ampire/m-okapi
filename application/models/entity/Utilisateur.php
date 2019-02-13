<?php
/**
 * Created by PhpStorm.
 * User: EDM
 * Date: 14/02/2019
 * Time: 00:39
 */

class Utilisateur {
    private $id;
    private $nomComplet;
    private $login;
    private $password;
    private $email;
    private $etat;

    /**
     * Utilisateur constructor.
     * @param $id
     * @param $nomComplet
     * @param $login
     * @param $password
     * @param $email
     * @param $etat
     */
    public function __construct($id, $nomComplet, $login, $password, $email, $etat)
    {
        $this->id = $id;
        $this->nomComplet = $nomComplet;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->etat = $etat;
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
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * @param mixed $nomComplet
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


}