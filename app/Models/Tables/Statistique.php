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
    public $date;
    public $score;
    public $idJoueur;
    public $idJeu;

    public function __construct($date  = "", $score = "", $idJoueur = "", $idJeu = "", $id = false)
    {
        parent::__construct();
        $this->date = $date;
        $this->score = $score;
        $this->idJoueur = $idJoueur;
        $this->idJeu = $idJeu;
        $this->id = $id;
    }

}