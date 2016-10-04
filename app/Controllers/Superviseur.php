<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 04/10/16
 * Time: 13:38
 */

namespace Controllers;


use Core\Controller;
use Helpers\DB\EntityManager;
use Helpers\Session;
use Models\Tables\Joueur;

class Superviseur extends Controller
{

    private $entityManager;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::getInstance();

    }


    public function ajouterJoueur()
    {
        // Récuperation des variables via un formulaire pour ajouter une personne sous sa tutelle
        $prenom =  $_POST['prenom'];
        $nom = $_POST['nom'];
        $idSuperviseur = Session::get('id');

        // Ajout en base du joueur
        $joueur = new Joueur($prenom,$nom,$idSuperviseur);
        $this->entityManager->save($joueur);

    }

}