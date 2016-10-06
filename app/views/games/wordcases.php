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
    <button id="submitscorebutton" onclick="SubmitScore()" type="button" class="btn btn-info">Soumettre le score</button>
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

