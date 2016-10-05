<?php
/**
 * Sample layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;
use Helpers\Session;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

    <!-- Site meta -->
    <meta charset="utf-8">
    <?php
	//hook for plugging in meta tags
	$hooks->run('meta');
    ?>
    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>
    <!-- CSS -->
    <?php
	Assets::css(array(
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
		Url::templatePath() . 'css/style.css',
		Url::templatePath() . 'css/chart.css',
	));

	Assets::js(array(
        'https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous',
        Url::templatePath() . 'js/chart.js',
    ));

	//hook for plugging in css
	$hooks->run('css');
    ?>

</head>
<header class="navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="<?= Url::templatePath(); ?>img/logo_transparent.png"/></a>
        <?php
            if(Session::get('loggedin') == true):
        ?>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="menumobile">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(Session::get('joueurConnecte') == true):
                ?>
                <li class="welcome"><a href="#"><?= "Bienvenue ".Session::get('prenomJoueur'); ?></a></li>
                <li><a href='<?= DIR?>profil/<?= Session::get('idJoueur'); ?>'>Profil</a></li>
                <li><a href='<?= DIR?>jeux/'>Jeux</a></li>
                <li><a href='<?= DIR?>desactiver_joueur'>Deconnexion</a></li>
                <?php
                else:
                ?>
                    <li><a href='<?= DIR?>dashboard/'>Gérer les utilisateurs</a></li>
                    <li><a href='<?= DIR?>deconnexion/'>Deconnexion</a></li>
                <?php
                endif;
                ?>
            </ul>
        </div><!-- /.container-fluid -->
    </div>
    </header>
    <?php
        endif;
    ?>
        <body>
        <?php
            //hook for running code after body tag
            $hooks->run('afterBody');
        ?>


        <div class="container-fluid">
