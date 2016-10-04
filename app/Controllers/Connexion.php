<?php
/**
 * Created by PhpStorm.
 * User: moz
 * Date: 28/01/16
 * Time: 15:19
 */

namespace Controllers;

use Helpers\DB\DBManager;
use Helpers\DB\EntityManager;
use Helpers\Gump;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use Helpers\AjaxHandler as Ajax;
use Core\Controller;
use Core\View;
use Models\Tables\Personne;
use Models\Tables\Score;
use Models\Queries\PersonneSQL;

class Connexion extends Controller
{
    private $superviseurSQL;
    private $entityManager;

    public function __construct() {
        parent::__construct();
        $this->superviseurSQL = new SuperviseurSQL();
        $this->entityManager = EntityManager::getInstance();
    }

    public function index()
    {
        $data['title'] = 'Connexion';
        View::renderTemplate('header', $data);
        View::render('connexion/connexion', $data);
        View::renderTemplate('footer', $data);
    }

    public function connexion() {

        $superviseur = $this->superviseurSQL->prepareFindByLogin($_POST['login']);
        if ($superviseur == false || Password::verify($_POST['password'], $user->motdepasse) == false){
            //Ajouter un message d'erreur
            Url::redirect();
        }
        else {
            // $is_valid holds an array for the errors.
            $error = false;
        }
        if (!$error) {
            Session::set('loggedin', true);
            Session::set('id', $superviseur->getId());
            Session::set('login', $superviseur->pseudo);

            Session::set('message', "Bienvenue $superviseur->pseudo");
            Session::set('message_type', 'alert-success');
        }
           Url::redirect();
    }

    public function deconnexion()
    {
        Session::destroy('', false);
        Url::redirect();
    }

    public function inscription()
    {
        $_POST = Gump::sanitize($_POST);
        if (isset($_POST['pseudo'])) {
            //Validate data using Gump
            $is_valid = Gump::is_valid($_POST, array(
                'pseudo' => 'required|alpha_numeric',
                'password' => 'required', //|max_len,18|min_len,6
                'password-again' => 'required' //|max_len,18|min_len,6
            ));

            if ($is_valid === true) {
                //Test for duplicate username`
                $superviseur = $this->superviseurSQL->prepareFindByLogin($_POST['pseudo']);

                if ($_POST['password'] != $_POST['password-again'])
                    $error[] = "Les deux mots de passes doivent être identiques";

                if ($superviseur != false)
                    $error[] = 'Ce compte existe déjà';

                $superviseur = $this->superviseurSQL->prepareFindByEmail($_POST['email'])->execute();
                //Test for dupicate email address
                if (count($superviseur) > 0)
                    $error[] = 'Ce compte email existe déjà.';

                $data['erreurs'] = $error;
                View::renderTemplate('header', $data);
                View::render('connexion/inscription', $data);
                View::renderTemplate('footer', $data);


            } else
                $error = $is_valid;

            if (!$error) {
                //Register and return the data as an array $data[]
                $pseudo = $_POST['pseudo']; $password = Password::make($_POST['password']);
                $superviseur = new Superviseur($pseudo, $password);
                print_r($superviseur);
                $this->entityManager->save($superviseur);
                Session::set('id', $superviseur->getId());
                Session::set('pseudo', $superviseur->login);
                Session::set('level',$superviseur->currentLvl);
                Session::set('loggedin', true);
                Url::redirect();
            }
        }
    }
}

