<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/functions.js"></script>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Jeu du Memory</title>

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
        window.location.href="index.php";
    }
    else
    {
        window.location.href="../index.php";
    }
}
</script>

<div style="padding-left: 530px; margin-top: 30px; font-size: 27px; font-weight: bold; color: #3b5998;">Jeu du Memory</div>
<div style="padding-left:400px; margin-top: 25px;">
    <table>
        <tr>
            <td style="padding-left: 140px; text-align: center;">
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
    <div id="image1" onclick="doTimer();"><img src="images/haut_parleur.png" style='display: none; border: none;' id="im"></div>
    <div id="image2" onclick="doTimer();"><img src="images/disquette.png" style='display: none; border: none;' id="im1"></div>
    <div id="image3" onclick="doTimer();"><img src="images/micro.png" style='display: none; border: none;' id="im2"></div>
    <div id="image4" onclick="doTimer();"><img src="images/tel.png" style='display: none; border: none;' id="im3"></div>
    <div id="image5" onclick="doTimer();"><img src="images/crayon.png" style='display: none; border: none; ' id="im4"></div>
    <div id="image6" onclick="doTimer();"><img src="images/velo.png" style='display: none; border: none; ' id="im5"></div>
    <div id="image7" onclick="doTimer();"><img src="images/logo_android.png" style='display: none; border: none; ' id="im6"></div>
    <div id="image8" onclick="doTimer();"><img src="images/tablette.png" style='display: none; border: none; ' id="im7"></div>
    <div id="image9" onclick="doTimer();"><img src="images/monitor.png" style='display: none; border: none; ' id="im8"></div>
    <div id="image10" onclick="doTimer();"><img src="images/cahier.png" style='display: none; border: none; ' id="im9"></div>
    <div id="image11" onclick="doTimer();"><img src="images/haut_parleur.png" style='display: none; border: none; ' id="im10"></div>
    <div id="image12" onclick="doTimer();"><img src="images/disquette.png" style='display: none; border: none; ' id="im11"></div>
    <div id="image13" onclick="doTimer();"><img src="images/micro.png" style='display: none; border: none; ' id="im12"></div>
    <div id="image14" onclick="doTimer();"><img src="images/tel.png" style='display: none; border: none; ' id="im13"></div>
    <div id="image15" onclick="doTimer();"><img src="images/crayon.png" style='display: none; border: none; ' id="im14"></div>
    <div id="image16" onclick="doTimer();"><img src="images/velo.png" style='display: none; border: none; ' id="im15"></div>
    <div id="image17" onclick="doTimer();"><img src="images/logo_android.png" style='display: none; border: none; ' id="im16"></div>
    <div id="image18" onclick="doTimer();"><img src="images/tablette.png" style='display: none; border: none; ' id="im17"></div>
    <div id="image19" onclick="doTimer();"><img src="images/monitor.png" style='display: none; border: none; ' id="im18"></div>
    <div id="image20" onclick="doTimer();"><img src="images/cahier.png" style='display: none; border: none; ' id="im19"></div>
</div>