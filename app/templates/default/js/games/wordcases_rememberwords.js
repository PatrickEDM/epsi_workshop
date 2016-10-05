
var rememberWordList = [];

function LoadEntryWordsBox()
{
    $("#wordListDiv").fadeOut( "slow", function() {});
    $(".screen").fadeOut( "slow", function() {
        $("#entrywordsbox").css({'visibility': "visible", 'opacity':'1'}).fadeIn( "slow", function() {});
        $("#concedebutton").css({'visibility': "visible", 'opacity':'1'}).fadeIn( "slow", function() {});
    });

    var verifyWordsEntered = window.setInterval("VerifyEntryWord()", 200);
}

function VerifyEntryWord()
{
    for(var i = 0; i < wordList.length; i++)
    {
        if(document.getElementById("entrywordsbox").value.toUpperCase()  == wordList[i])
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
                }
            }
            else
            {
                rememberWordList.push(wordList[i]);
                document.getElementById("entrywordsbox").value = "";
                nbRememberWords++;
            }
        }
    }
    if(nbRememberWords == nbWordsToFind)
        Finish();
}

function Concede()
{
    $("#entrywordsbox").fadeOut( "slow", function() {});
    $("#concedebutton").fadeOut( "slow", function() {
        $("#submitscorebutton").css({'visibility': "visible", 'display':'inline', 'opacity':'1'}).fadeIn( "slow", function() {});
    });
    $("#score").html(nbRememberWords + " mots trouvés sur " + nbWordsToFind + " !");
}

function Finish()
{
    $("#entrywordsbox").fadeOut( "slow", function() {});
    $("#concedebutton").fadeOut( "slow", function() {
        $("#submitscorebutton").css({'visibility': "visible", 'display':'inline', 'opacity':'1'}).fadeIn( "slow", function() {});
    });
    $("#score").html(nbRememberWords + " mots trouvés sur " + nbWordsToFind + ", Bravo !");
}

function SubmitScore()
{

}