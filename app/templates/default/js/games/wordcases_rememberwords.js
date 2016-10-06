
var rememberWordList = [];
var verifyWordsEntered;

function LoadEntryWordsBox()
{
    $("#wordListDiv").fadeOut( "slow", function() {});
    $(".screen").fadeOut( "slow", function() {
        $("#entrywordsboxtitle").css({'visibility': "visible", 'opacity':'1'}).fadeIn( "slow", function() {});
        $("#entrywordsbox").css({'visibility': "visible", 'opacity':'1'}).fadeIn( "slow", function() {});
        $("#concedebutton").css({'visibility': "visible", 'opacity':'1'}).fadeIn( "slow", function() {});
        $(".progress").css({'visibility': "visible", 'opacity':'1'}).fadeIn( "slow", function() {});
        $("#wordListDiv").html("");
    });
    var purcent = (Math.round((nbRememberWords / nbWordsToFind)*100)) + "%";
    console.log(purcent);
    $(".scorebar").css({'width': purcent}).html(nbRememberWords + " mots sur " + nbWordsToFind);
    verifyWordsEntered = window.setInterval("VerifyEntryWord()", 200);
}

function VerifyEntryWord()
{
    for(var i = 0; i < wordList.length; i++)
    {
        if(document.getElementById("entrywordsbox").value.toUpperCase() == wordList[i])
        {
            if(rememberWordList.length > 0)
            {
                var wordAlreadyEnter = false;
                for(var j = 0; j < rememberWordList.length; j++)
                {
                    if(document.getElementById("entrywordsbox").value.toUpperCase() == rememberWordList[j])
                        wordAlreadyEnter = true;
                }
                if(!wordAlreadyEnter)
                {
                    rememberWordList.push(wordList[i]);
                    document.getElementById("entrywordsbox").value = "";
                    nbRememberWords++;
                    var purcent = (Math.round((nbRememberWords / nbWordsToFind)*100)) + "%";
                    console.log(purcent);
                    $(".scorebar").css({'width': purcent}).html(nbRememberWords + " mots sur " + nbWordsToFind);
                }
            }
            else
            {
                rememberWordList.push(wordList[i]);
                document.getElementById("entrywordsbox").value = "";
                nbRememberWords++;
                var purcent = (Math.round((nbRememberWords / nbWordsToFind)*100)) + "%";
                console.log(purcent);
                $(".scorebar").css({'width': purcent}).html(nbRememberWords + " mots sur " + nbWordsToFind);;
            }
        }
    }
    if(nbRememberWords == nbWordsToFind)
        Finish();
}

function Concede()
{
    $("#entrywordsboxtitle").fadeOut( "slow", function() {});
    $("#entrywordsbox").fadeOut( "slow", function() {});
    $("#concedebutton").fadeOut( "slow", function() {
        $("#submitscorebutton").css({'visibility': "visible", 'display':'inline', 'opacity':'1'}).fadeIn( "slow", function() {});
    });
    $("#score").html("SCORE: " + Math.round((nbRememberWords / nbWordsToFind)*100) + " points !");
    clearInterval(verifyWordsEntered);
    $('#scorelink').attr("href", $('#scorelink').attr("href") + "jeux/savemotscases/" + Math.round((nbRememberWords / nbWordsToFind)*100).toString());
    displayWordListFinal();
}

function Finish()
{
    $("#entrywordsboxtitle").fadeOut( "slow", function() {});
    $("#entrywordsbox").fadeOut( "slow", function() {});
    $("#concedebutton").fadeOut( "slow", function() {
        $("#submitscorebutton").css({'visibility': "visible", 'display':'inline', 'opacity':'1'}).fadeIn( "slow", function() {});
    });
    $("#score").html("SCORE: " + Math.round((nbRememberWords / nbWordsToFind)*100) + " points !");
    clearInterval(verifyWordsEntered);
    $('#scorelink').attr("href", $('#scorelink').attr("href") + "jeux/savemotscases/" + (Math.round((nbRememberWords / nbWordsToFind)*100)).toString());
    displayWordListFinal();
}

function displayWordListFinal()
{
    $("#wordListDiv").html("<p id=\"wordsToSearchTitle\">Mots à chercher:</p><ul id=\"wordList\"></ul>");
    nbWordsToFind = 0;
    WriteList();
    $("#wordListDiv").fadeIn( "slow", function() {});
    $(".word").each(function () {
        $(this).removeClass("wordfound");
        if(!(rememberWordList.length > 0))
            $(this).addClass("wordnotfound");
        else
        {
            var isFound = false;
            for(var j = 0; j < rememberWordList.length; j++)
            {
                if($(this).html().toUpperCase() == rememberWordList[j].toUpperCase())
                {
                    isFound = true;
                    $(this).addClass("wordfound");
                    break;
                }
            }
            if(!isFound)
                $(this).addClass("wordnotfound");
        }
    });
}
