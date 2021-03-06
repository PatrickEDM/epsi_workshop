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
use Helpers\DB\DBManager;
use Helpers\Session;
use Core\View;
use Helpers\Url;
use Models\Queries\JeuSQL;
use Models\Queries\JoueurSQL;
use Models\Queries\StatistiqueSQL;
use Models\Tables\Joueur;

class Joueurgestion extends Controller
{

    private $entityManager;
    private $dbManager;
    private $joueurSQL;
    private $statistiqueSQL;
    private $jeuSQL;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::getInstance();
        $this->dbManager = DBManager::getInstance();
        $this->joueurSQL = new JoueurSQL();
        $this->statistiqueSQL = new StatistiqueSQL();
        $this->jeuSQL = new JeuSQL();
    }

    public function profil($id){
        $data['title'] = "Profil";
        $data['joueur'] = $this->joueurSQL->findById($id);

        $jeux = $this->jeuSQL->prepareFindAll()->execute();

        foreach ($jeux as $j){
            $data['Jeux'][] = $this->statistiqueSQL->prepareFindAvgScoreByGame($id, $j->getId())->execute();
            $data['Nom_Jeux'][] = $j->nom;
        }
        View::renderTemplate('header', $data);
        View::render('user/profil', $data);
        View::renderTemplate('footer', $data);
    }
}