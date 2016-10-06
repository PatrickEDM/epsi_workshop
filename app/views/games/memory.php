<?php
use Helpers\Url;
use Helpers\Assets;

Assets::css(array(
	Url::templatePath() . 'css/memory.css',
));

Assets::js(array(
    Url::templatePath() . 'js/games/memory.js',
));

?>

<script type="text/javascript">
var voirimg = "";
var imageouverte1 = "";
var pair = 0;
$(document).ready(function() {
    $("#submitscorebutton").hide();
    shuffle();
    $("#case div").click(function()
    {
        id = $(this).attr("id");
        if ($("#"+id+" img").is(":hidden"))
        {
            $("#"+id+" img").fadeIn('fast');
            if (imageouverte1 == "")
            {
                voirimg = id;
                imageouverte1 = $("#"+id+" img").attr("src");
            }
            else
            {
                imagedejaouverte = $("#"+id+" img").attr("src");
                if (imageouverte1 != imagedejaouverte)
                {
                    $("#"+id+" img").slideUp("slow");
                    $("#"+voirimg+" img").slideUp("slow");
                    voirimg = "";
                    imageouverte1 = "";
                }
                else
                {
                    $("#"+id+" img").show();
                    $("#"+voirimg+" img").show();
                    voirimg = "";
                    imageouverte1 = "";
                    pair+=1;
                }
            }
            if(pair==10)
            {
                setTimeout('finish()', 400);
            }
        }
    });
});
function finish()
{
    var cnt1 = document.getElementById('compteurmouvement').innerHTML;
    stopCount();
    document.getElementById('submitscorebutton').href ="<?= DIR; ?>jeux/savememory/"+(120-cnt1);
    $("#submitscorebutton").css({'visibility': "visible", 'opacity':'1'}).fadeIn( "slow", function() {});
}
</script>

<p class="title">Score : <span id="compteurmouvement"></span></p>
<p class="compteur">Temps : <span id="compteurtemps"></span></p>
<div class="row">
    <div class="grid col-md-offset-1 col-md-3 col-sm-12">
        <div id="case" onclick="count();">
            <div id="image1" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/haut_parleur.png" id="im"></div>
            <div id="image2" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/disquette.png" id="im1"></div>
            <div id="image3" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/micro.png" id="im2"></div>
            <div id="image4" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tel.png" id="im3"></div>
            <div id="image5" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/crayon.png"  id="im4"></div>
            <div id="image6" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/velo.png" id="im5"></div>
            <div id="image7" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/logo_android.png" id="im6"></div>
            <div id="image8" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tablette.png" id="im7"></div>
            <div id="image9" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/monitor.png" id="im8"></div>
            <div id="image10" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/cahier.png" id="im9"></div>
            <div id="image11" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/haut_parleur.png" id="im10"></div>
            <div id="image12" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/disquette.png" id="im11"></div>
            <div id="image13" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/micro.png" id="im12"></div>
            <div id="image14" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tel.png" id="im13"></div>
            <div id="image15" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/crayon.png" id="im14"></div>
            <div id="image16" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/velo.png" id="im15"></div>
            <div id="image17" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/logo_android.png" id="im16"></div>
            <div id="image18" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tablette.png"  id="im17"></div>
            <div id="image19" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/monitor.png" id="im18"></div>
            <div id="image20" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/cahier.png"  id="im19"></div>
        </div>
    </div>

</div>
<a id="submitscorebutton" type="button" class="btn btn-info" style="">Soumettre le score</a>
