<?php
use Helpers\Url;
use Helpers\Assets;


Assets::js(array(
    Url::templatePath() . 'js/games/memory.js',
));

?>

<style>
    #case
    {
        margin: 20px 0px 0px 400px;
        width: 625px;
    }
    #case div
    {
        float: left;
        width: 105px;
        height: 105px;
        background: #3b5998;
        margin: 5px;
        border: 1px solid #999;
        -webkit-border-radius: .5em;
        -moz-border-radius: .5em;
    }

    .bouton {
        background-color: #3b5998; /* bleu facebook */
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        border-radius: 8px;
    }
</style>

<script type="text/javascript">
var voirimg = "";
var imageouverte1 = "";
var pair = 0;
$(document).ready(function() {
    $("img").hide();
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
    var cnt1 = $("#compteurmouvement").val();
    var temps=$("#compteurtemps").val();
    alert("Félicitations! Vous avez gagné avec un total de : "+cnt1+" mouvements et en : "+temps+" secondes");
    if(confirm("Voulez-vous jouer à nouveau ?"))
    {
        stopCount();
        window.location.href= "<?= DIR; ?>games/savememory/"+cnt1+","+temps+",y";
    }
    else
    {
        stopCount();
        window.location.href= "<?= DIR; ?>games/savememory/"+cnt1+","+temps+",n";
    }
}
</script>

<div>Jeu du Memory</div>
<div>
    <table>
        <tr>
            <td>
                Mouvements: <input type="text" id="compteurmouvement" name="cnt" size="6" readonly />
            </td>
            <td style="padding-left: 10px;">
                Temps: <input type="text" id="compteurtemps" name="temps" size="6" readonly />
            </td>
            <td
            <div class="bouton">
                <p>
                    <a href="http://www.team-violet.tk" id="relance" style="text-decoration:none; color: #FFFFFF;">relancer</a
                </p>
            </div>
            </td>
        </tr>
    </table>
</div>
<div id="case" onclick="count();" align="center">
    <div id="image1" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/haut_parleur.png" style='display: none; border: none;' id="im"></div>
    <div id="image2" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/disquette.png" style='display: none; border: none;' id="im1"></div>
    <div id="image3" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/micro.png" style='display: none; border: none;' id="im2"></div>
    <div id="image4" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tel.png" style='display: none; border: none;' id="im3"></div>
    <div id="image5" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/crayon.png" style='display: none; border: none; ' id="im4"></div>
    <div id="image6" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/velo.png" style='display: none; border: none; ' id="im5"></div>
    <div id="image7" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/logo_android.png" style='display: none; border: none; ' id="im6"></div>
    <div id="image8" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tablette.png" style='display: none; border: none; ' id="im7"></div>
    <div id="image9" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/monitor.png" style='display: none; border: none; ' id="im8"></div>
    <div id="image10" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/cahier.png" style='display: none; border: none; ' id="im9"></div>
    <div id="image11" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/haut_parleur.png" style='display: none; border: none; ' id="im10"></div>
    <div id="image12" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/disquette.png" style='display: none; border: none; ' id="im11"></div>
    <div id="image13" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/micro.png" style='display: none; border: none; ' id="im12"></div>
    <div id="image14" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tel.png" style='display: none; border: none; ' id="im13"></div>
    <div id="image15" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/crayon.png" style='display: none; border: none; ' id="im14"></div>
    <div id="image16" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/velo.png" style='display: none; border: none; ' id="im15"></div>
    <div id="image17" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/logo_android.png" style='display: none; border: none; ' id="im16"></div>
    <div id="image18" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/tablette.png" style='display: none; border: none; ' id="im17"></div>
    <div id="image19" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/monitor.png" style='display: none; border: none; ' id="im18"></div>
    <div id="image20" onclick="doTimer();"><img src="<?= Url::templatePath(); ?>img/memory/cahier.png" style='display: none; border: none; ' id="im19"></div>
</div>