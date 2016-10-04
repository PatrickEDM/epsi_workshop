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
    public $pseudo;
    public $motDePasse;

    public function __construct($idSuperviseur = false, $pseudo = "", $motDePasse = "")
    {
        parent::__construct();
        $this->idSuperviseur = $idSuperviseur;
        $this->motDePasse = $motDePasse;
        $this->pseudo = $pseudo;
    }

}