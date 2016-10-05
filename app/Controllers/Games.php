<?php
/**
 * Created by PhpStorm.
 * User: PatrickEDM
 * Date: 05/10/2016
 * Time: 10:49
 */

namespace Controllers;


use Core\Controller;
use Helpers\DB\EntityManager;
use Helpers\Session;
use Core\View;
use Helpers\Url;
use Models\Queries\JeuSQL;
use Models\Queries\JoueurSQL;
use Models\Queries\StatistiqueSQL;
use Models\Tables\Joueur;

class Games extends Controller
{

    private $entityManager;
    private $jeuSQL;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::getInstance();
        $this->jeuSQL = new JeuSQL();
    }

    public function memory(){
        $data['jeu'] = $this->jeuSQL->prepareFindByNom("Memory")->execute()[0];

        View::renderTemplate('header', $data);
        View::render('games/memory', $data);
        View::renderTemplate('footer', $data);
    }
    public function wordcases(){
        View::renderTemplate('header', $data);
        View::render('games/wordcases',$data);
        View::renderTemplate('footer', $data);
    }
}