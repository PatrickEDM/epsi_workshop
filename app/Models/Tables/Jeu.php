<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 04/10/16
 * Time: 09:38
 */

namespace Models\Tables;


use Helpers\DB\Entity;

class Jeu extends Entity
{
    public $idJeu;
    public $nom;

    public function __construct($idJeu = false, $nom)
    {
        parent::__construct();
        $this->idJeu = $idJeu;
        $this->nom = $nom;
    }

}