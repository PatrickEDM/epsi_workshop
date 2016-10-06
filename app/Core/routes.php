<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date updated Sept 19, 2015
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Define routes. */
Router::any('', 'Controllers\Welcome@index');
Router::any('connexion','Controllers\Connexion@connexion');
Router::any('inscription','Controllers\Connexion@inscription');
Router::any('deconnexion','Controllers\Connexion@deconnexion');
Router::any('dashboard','Controllers\Superviseur@dashboard');
Router::any('inscription_joueur','Controllers\Superviseur@ajouterJoueur');
Router::any('supprimer_joueur/(:any)','Controllers\Superviseur@supprimerJoueur');
Router::any('activer_joueur/(:any)','Controllers\Superviseur@connexionJoueur');
Router::any('desactiver_joueur','Controllers\Superviseur@deconnexionJoueur');
Router::any('profil/(:any)','Controllers\Joueurgestion@profil');
Router::any('jeux/memory','Controllers\Games@memory');
Router::any('jeux/motscases','Controllers\Games@wordcases');
Router::any('jeux/savemotscases/(:any)','Controllers\Games@savewordcases');
Router::any('jeux/savememory/(:any)','Controllers\Games@savememory');

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
