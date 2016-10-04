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
    public $pseudo;
    public $motDePasse;

    public function __construct($pseudo = "", $motDePasse = "", $id = false)
    {
        parent::__construct();
        $this->pseudo = $pseudo;
        $this->motDePasse = $motDePasse;
        $this->id = $id;
    }

}