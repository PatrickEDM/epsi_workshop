<?php
/**
 * Created by PhpStorm.
 * User: PatrickEDM
 * Date: 04/10/2016
 * Time: 13:34
 */

?>

<form class="form" action="<?= DIR;?>inscription_joueur" method="post">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prénom">
    <button type="submit" id="joueur-button">Ajouter un utilisateur</button>
</form>

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
            <td><?= $j->nom; ?></td>
            <td><?= $j->prenom; ?></td>
            <td><a href="<?= DIR ?>profil/<?= $j->getId(); ?>" class="btn btn-success" role="button">Profil</a></td>
            <td><a href="<?= DIR ?>activer_joueur/<?= $j->getId(); ?>" class="btn btn-primary" role="button">Activer</a></td>
            <td><a href="<?= DIR ?>supprimer_joueur/<?= $j->getId(); ?>" class="btn btn-danger" role="button">Supprimer</a></td>
        </tr>
        <?php
    endforeach;
    ?>
    </tbody>
</table>