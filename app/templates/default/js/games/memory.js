/**
 * Created by PatrickEDM on 05/10/2016.
 */
var click=1;
function count()
{
    var x = click++;
    document.getElementById('compteurmouvement').innerHTML = x;
}

function randomFromTo(from, to)
{
    return Math.floor(Math.random() * (to - from + 1) + from);
}
function shuffle()
{
    $("img").hide();
    var images = $("#case").children();
    var shuf = $("#case div:first-child");
    var array_img = new Array();
    for (i=0; i<images.length; i++)
    {
        array_img[i] = $("#"+shuf.attr("id")+" img").attr("src");
        shuf = shuf.next();
    }
    var shuf = $("#case div:first-child");
    for (z=0; z<images.length; z++)
    {
        randIndex = randomFromTo(0, array_img.length - 1);
        $("#"+shuf.attr("id")+" img").attr("src", array_img[randIndex]);
        array_img.splice(randIndex, 1);
        shuf = shuf.next();
    }
}

var c=0;
var t;
var timer=0;

function timedCount()
{
    document.getElementById('compteurtemps').innerHTML=c;
    c=c+1;
    t=setTimeout("timedCount()",1000);
}
function doTimer()
{
    if (!timer)
    {
        timer=1;
        timedCount();
    }
}
function stopCount()
{
    clearTimeout(t);
    timer=0;
}