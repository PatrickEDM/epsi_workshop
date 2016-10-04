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
use Models\Tables\Joueur;

class Joueurgestion extends Controller
{

    private $entityManager;
    private $joueurSQL;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::getInstance();
        $this->joueurSQL = new JoueurSQL();
    }

    public function profil($id){
        $data['title'] = "Profil";
        $data['joueur'] = $this->joueurSQL->findById($id);
        View::renderTemplate('header', $data);
        View::render('user/profil', $data);
        View::renderTemplate('footer', $data);
    }
}