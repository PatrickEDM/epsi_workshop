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
	));

	//hook for plugging in css
	$hooks->run('css');
    ?>

</head>


<header class="navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= DIR?>" class="navbar-brand">Memory Training</a>
                </li>
                <?php
                    if(Session::get('loggedin') == true):
                ?>
                <li><a href='<?= DIR?>jeux/'>Jeux</a></li>
                <li><a href='<?= DIR?>utilisateur/'>Gérer les utilisateurs</a></li>
                <li><a href='<?= DIR?>deconnexion/'>Deconnexion</a></li>
                <li><?= Session::get('message') ?></li>
                <?php
                    endif;
                ?>
            </ul>
        </nav>
    </div>
</header>

<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>


<div class="container-fluid">
