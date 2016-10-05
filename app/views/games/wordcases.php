<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>MotsCases</title>

    <!-- Modifier les appels des feuilles de style css suivantes pour les trouver. -->
    <link rel="stylesheet" href="Style/wordcases_style.css"/>
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <!-- Fin des appels de feuilles de style css -->
</head>
<body>


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


<!-- Modifier les appels des scripts suivants pour les trouver. Ne pas changer l'ordre. -->
<!-- Scripts complémentaires -->
<script src="JQuery/jquery-2.1.4.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<!-- Scripts du jeu -->
<script src="wordcases_main.js"></script>
<script src="wordcases_inputs.js"></script>
<script src="wordcases_wordPlacement.js"></script>
<script src="wordcases_rememberWords.js"></script>
<!-- Fin des appels de scripts -->
</body>
</html>
