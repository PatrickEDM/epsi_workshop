<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 04/10/16
 * Time: 09:25
 */

namespace Models\Tables;


use Helpers\DB\Entity;

class Superviseur extends Entity
{

    public $idSuperviseur;
    public $prenom;
    public $nom;
    public $email;
    public $motDePasse;

    public function __construct($idSuperviseur = false, $prenom, $nom, $email, $motDePasse)
    {
        parent::__construct();
        $this->idSuperviseur = $idSuperviseur;
        $this->motDePasse = $motDePasse;
        $this->nom = $nom;
        $this->prenom=$prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

}