<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 04/10/16
 * Time: 09:50
 */

namespace Models\Tables;


use Helpers\DB\Entity;

class Statistique extends Entity
{
    public $idStatistique;
    public $date;
    public $idJoueur;
    public $idJeu;

    public function __construct($idStatistique = false, $date, $idJoueur, $idJeu)
    {
        parent::__construct();
        $this->idStatistique = $idStatistique;
        $this->date = $date;
        $this->idJoueur = $idJoueur;
        $this->idJeu = $idJeu;
    }

}