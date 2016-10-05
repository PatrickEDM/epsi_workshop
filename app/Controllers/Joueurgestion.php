<?php
/**
 * Created by PhpStorm.
 * User: PatrickEDM
 * Date: 04/10/2016
 * Time: 15:57
 */

namespace Controllers;


use Core\Controller;
use Helpers\DB\EntityManager;
use Helpers\Session;
use Core\View;
use Helpers\Url;
use Models\Queries\JoueurSQL;
use Models\Queries\StatistiqueSQL;
use Models\Tables\Joueur;

class Joueurgestion extends Controller
{

    private $entityManager;
    private $joueurSQL;
    private $statistiqueSQL;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::getInstance();
        $this->joueurSQL = new JoueurSQL();
        $this->statistiqueSQL = new StatistiqueSQL();
    }


    public function chargerScore($id)
    {
        // On Charge les scores de la personne identifié par la variable $id
        $condition = "idJoueur = ".$id;
        $statistique = $this->statistiqueSQL->prepareFindWithCondition($condition)->execute();
        // On retourne un tableau contenant tous les résultats
        return $statistique;

    }

    public function profil($id){
        $data['title'] = "Profil";
        $data['joueur'] = $this->joueurSQL->findById($id);
        $data['stat'] = $this->chargerScore($id);
        View::renderTemplate('header', $data);
        View::render('user/profil', $data);
        View::renderTemplate('footer', $data);
    }
}