<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 04/10/16
 * Time: 09:33
 */

namespace Models\Tables;


use Helpers\DB\Entity;

class Joueur extends Entity
{

    public $idJoueur;
    public $prenom;
    public $nom;
    public $idSuperviseur;

    public function __construct($idJoueur = false, $prenom, $nom, $idSuperviseur)
    {
        parent::__construct();
        $this->idJoueur = $idJoueur;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->idSuperviseur = $idSuperviseur;

    }

}