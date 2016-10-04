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
    public $nom;

    public function __construct($nom = "", $id = false)
    {
        parent::__construct();
        $this->nom = $nom;
        $this->id = $id;
    }

}