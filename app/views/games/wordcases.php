<?php
use Helpers\Url;
use Helpers\Assets;

?>


<!-- ================================================================================== -->
<!-- Elements du jeu -->
<!-- ================================================================================== -->
<br/><br/>
<p id="score"></p>
<div class="screen">

</div>
</br>
<div id="wordListDiv">
    <p id="wordsToSearchTitle">Mots à chercher:</p>
    <ul id="wordList">
    </ul>
</div>
<div class="remember col-md-offset-1 col-md-6 col-sm-6">
    <p id="entrywordsboxtitle">Entrez les mots dont vous vous souvenez...</p>
    <input id="entrywordsbox" type="text" name="wordToRemember" value="" placeholder="Entrez les mots dont vous vous souvenez...">
    </br></br>
    <div class="progress">
        <div class="progress-bar progress-bar-success progress-bar-striped active scorebar" role="progressbar"
             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            0%
        </div>
    </div>
    <a id="scorelink" href="<?= DIR; ?>" ><button id="submitscorebutton" type="button" class="btn btn-info">Soumettre le score</button></a>
    <button id="concedebutton" onclick="Concede()" type="button" class="btn btn-danger">Abandonner</button>
</div>
    <!-- ================================================================================== -->
<!-- Fin des éléments du jeu -->
<!-- ================================================================================== -->

<?php
Assets::js(array(
    Url::templatePath() . 'js/games/wordcases_main.js',
    Url::templatePath() . 'js/games/wordcases_inputs.js',
    Url::templatePath() . 'js/games/wordcases_wordplacements.js',
    Url::templatePath() . 'js/games/wordcases_rememberwords.js',
));
?>

