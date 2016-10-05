<?php
use Helpers\Url;
use Helpers\Assets;

Assets::css(array(
	Url::templatePath() . 'css/table.css',
));


?>

<form id="adduser" class="form" action="<?= DIR;?>inscription_joueur" method="post">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prénom">
    <button type="submit" id="joueur-button">Ajouter un utilisateur</button>
</form>
<div class="row">
    <div class="col-md-12 col-sm-4">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Profil</th>
                <th>Activer</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php

foreach($data['joueurs'] as $j):
?>
            <tr>
                <td><?php echo $j->nom; ?></td>
                <td><?php echo $j->prenom; ?></td>
                <td><a href="<?php echo DIR ?>profil/<?php echo $j->getId(); ?>" class="btn btn-success" role="button">Profil</a></td>
                <td><a href="<?php echo DIR ?>activer_joueur/<?php echo $j->getId(); ?>" class="btn btn-primary" role="button">Activer</a></td>
                <td><a href="<?php echo DIR ?>supprimer_joueur/<?php echo $j->getId(); ?>" class="btn btn-danger" role="button">Supprimer</a></td>
            </tr>
            <?php
endforeach;
?>
            </tbody>
        </table>
    </div>
</div>