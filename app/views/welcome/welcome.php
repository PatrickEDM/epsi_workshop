<?php
    use Core\Language;
    use Helpers\Session;
?>

<div class="row center">
    <div class="col-md-offset-1 col-md-3 col-sm-12">
        <div id="login">
            <h1>Bienvenue</h1>
            <?php
            if(Session::get('loggedin') == false):
            ?>
            <div class="login">
                <form class="form" action="<?= DIR;?>connexion" method="post">
                    <input type="text" name="pseudo" placeholder="Nom d'utilisateur">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <button type="submit" id="login-button">Connexion</button>
                </form>
                <a href="#" id="register_anim">Vous n'avez pas de compte ?</a>
            </div>
            <div class="register">
                <form class="form" action="<?= DIR;?>inscription" method="post">
                    <input type="text" name="pseudo" placeholder="Nom d'utilisateur">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <input type="password" name="password-again" placeholder="Confirmer le mot de passe">
                    <button type="submit" id="register-button">S'inscrire</button>
                </form>
                <a href="#" id="login_anim">Vous avez déjà un compte ?</a>
            </div>
            <?php
            endif;
            ?>
        </div>
    </div>
    <div class="col-md-offset-2 col-md-5">
        <div class="accueil_txt">
            <h3>La maladie d'Alzheimer</h3>
            <p>Aujourd’hui, 3 millions de Français sont directement ou indirectement touchés par la maladie d’Alzheimer, dont plus de 850 000 personnes malades. Avec près de 225 000 nouveaux cas diagnostiqués chaque année, la maladie progresse, si rien ne change, notre pays comptera 1 275 000 personnes malades dans seulement 8 ans.</p>
            <p>Avec Memory Training, vos patients peuvent améliorer leur mémoire.</p>
        </div>
    </div>
</div>