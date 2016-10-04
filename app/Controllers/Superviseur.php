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
use Core\View;
use Helpers\Url;
use Models\Queries\JoueurSQL;
use Models\Tables\Joueur;

class Superviseur extends Controller
{

    private $entityManager;
    private $joueurSQL;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = EntityManager::getInstance();
        $this->joueurSQL = new JoueurSQL();
    }

    public function dashboard(){

        $data['joueurs'] = $this->joueurSQL->prepareFindByIdsuperviseur(Session::get('id'))->execute();


        View::renderTemplate('header', $data);
        View::render('manage_user/users', $data);
        View::renderTemplate('footer', $data);
    }

    public function ajouterJoueur()
    {
        // Récuperation des variables via un formulaire pour ajouter une personne sous sa tutelle
        $prenom =  $_POST['prenom'];
        $nom = $_POST['nom'];
        $condition = " nom = '".$nom."' and prenom = '".$prenom."'";
        $joueur = $this->joueurSQL->prepareFindWithCondition($condition)->execute();
        if($joueur)
        {
            echo "Ce joueur existe déjà";
        }
        else
        {
            $idSuperviseur = Session::get('id');
            // Ajout en base du joueur
            $joueur = new Joueur($prenom,$nom,$idSuperviseur);
            $this->entityManager->save($joueur);
        }
        Url::redirect(dashboard);
    }

    public function supprimerJoueur($id)
    {

        $joueur = $this->joueurSQL->findById($id);
        $this->entityManager->delete($joueur);
        Url::redirect(dashboard);
    }

    public function connexionJoueur($joueur)
    {
        // /!\ Attention, aucun rapport avec la connexion, on garde juste en session les données relatives au Joueur sous la tutelle du
        // superviseur connecté

        Session::set('idJoueur',$joueur->id);
        Session::set('nomJoueur',$joueur->nom);
        Session::set('prenomJoueur',$joueur->prenom);
        Session::set('joueurConnecte', true);
        Url::redirect(dashboard);
    }

}