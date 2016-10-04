<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 04/10/16
 * Time: 15:50
 */

namespace Controllers;


use Core\Controller;
use Helpers\DB\EntityManager;
use Helpers\Session;
use Models\Tables\Statistique as Stat;

class Statistique extends Controller
{

    private $entityManager;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::getInstance();

    }


    public function enregistrerScore($score, $idJeu)
    {
        $idJoueur = Session::get('idJoueur');
        $date = date('j-m-y');
        $statistique = new Stat($date,$score,$idJoueur,$idJeu);
        $this->entityManager->save($statistique);
    }




}