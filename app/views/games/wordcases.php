<?php
use Helpers\Url;
use Helpers\Assets;

Assets::css(array(
	Url::templatePath() . 'css/wordcases_style.css',
));


?>


<!-- ================================================================================== -->
<!-- Elements du jeu -->
<!-- ================================================================================== -->
<br/><br/>
<p id="score"></p>
<div class="screen">

</div>
<div id="wordListDiv">
    Mots à chercher:
    <ul id="wordList">
    </ul>
</div>
<input id="entrywordsbox" type="text" name="wordToRemember" value="" placeholder="Entrez les mots dont vous vous souvenez...">
<button id="submitscorebutton" onclick="SubmitScore()" type="button" class="btn btn-info">Soumettre le score</button>
<button id="concedebutton" onclick="Concede()" type="button" class="btn btn-danger">Abandonner</button>
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

