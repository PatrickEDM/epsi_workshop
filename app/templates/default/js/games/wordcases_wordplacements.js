
var wordList = [];
var dictionnary = ["ARMOIRE", "ORDINATEUR", "PRAIRIE", "NUAGES", "ESCALIER",
    "PIOCHE", "CAILLOU", "THEIERE", "CAFE", "BOISSON",
    "ENFANTS", "BOUTEILLE", "MAILLOT", "CHEVEUX", "VISAGE",
    "FENETRE", "SOURIS", "CHAT", "MAISON", "IMMEUBLE",
    "CIEL", "OCEAN", "AVION", "POULET", "CHIEN",
    "CABANE", "FORET", "MONTAGNE", "PIERRE", "FRAISE",
    "MUSIQUE", "GUITARE", "ECHELLE", "VOYAGE", "TRAIN",
    "VOITURE", "TELEPHONE", "CHAMPS", "BILBOQUET"];
var nbWordsToFind = 0;
var nbWordsFound = 0;
var nbRememberWords = 0;
var nbGridWords = 10;

function WriteList()
{
    for(var i = 0; i < wordList.length; i++)
    {
        if(wordList[i] != "0")
        {
            $("#wordList").html($("#wordList").html() + '<li class=\"word\" wordId="' + i + '">' + wordList[i] + '</li>');
            nbWordsToFind++;
        }
    }
}

function GenerateBoardLetters()
{
    boardLetters = [];
    for(var i = 0; i < nbLines; i++)
    {
        boardLetters.push([]);
        for(var j = 0; j < nbCol; j++)
        {
            boardLetters[i].push("0");
            //boardLetters[i].push(alphabet[Math.round(Math.random()*(alphabet.length-1))]);
        }
    }
}

function Replace0ByRandomLetters()
{
    for(var i = 0; i < nbLines; i++)
    {
        for(var j = 0; j < nbCol; j++)
        {
            if(boardLetters[i][j] == 0)
                boardLetters[i][j] = alphabet[Math.round(Math.random()*(alphabet.length-1))];
        }
    }
}

function TryToPlace(word, maxIterations)
{
    var iterations = 0;
    var wordPlaced = false;
    do
    {
        if(word.length <= nbCol)
            wordPlaced = checkPlacement(new point((Math.round(Math.random()*nbCol))-1, (Math.round(Math.random()*nbCol))-1), word);
        iterations++;
    } while ((!wordPlaced) && (iterations < maxIterations))
    return wordPlaced;
}

function point(posX, posY)
{
    this.x = posX;
    this.y = posY;
}

function VerifyWord(final)
{
    var wordFound = false;
    for(var i = 0; i < wordList.length; i++)
        if(currentWord == wordList[i])
            wordFound = true;
    if((mobileDevice && wordFound) || (!mobileDevice && final && wordFound))
    {
        stopWordSelection();
        $(".word").each(function() {
            if($(this).text() == currentWord)
                $(this).addClass("wordfound");
        });
        currentWordCells.forEach(function(value){
            $(value).addClass("rightcell");
        });
        nbWordsFound++;
        if(nbWordsFound == nbWordsToFind)
            LoadEntryWordsBox();
    }
    else if(final)
    {
        stopWordSelection();
        currentWordCells.forEach(function(value){
            $(value).addClass("wrongcell");
        });
    }
}

function TryToPlaceDictionnary()
{
    for(var i = 0; i < wordList.length; i++)
    {
        var wordPlaced = TryToPlace(wordList[i], 60);
        if(!wordPlaced)
            wordList[i] = "0";
    }
}

function placeWordAt(word, origin, direction)
{
    var x = origin.x;
    var y = origin.y;
    switch(direction)
    {
        case 0: // Top
            for(var i = 0; i < word.length; i++)
            {
                boardLetters[x][y-i] = word[i];
            }
            break;
        case 1: // Bottom
            for(var i = 0; i < word.length; i++)
            {
                boardLetters[x][y+i] = word[i];
            }
            break;
        case 2: // Left
            for(var i = 0; i < word.length; i++)
            {
                boardLetters[x-i][y] = word[i];
            }
            break;
        case 3: // Right
            for(var i = 0; i < word.length; i++)
            {
                boardLetters[x+i][y] = word[i];
            }
            break;
        default:
            break;
    }
}

function checkPlacement(origin, word)
{
    var directions = [1, 3];
    var checks = 0;
    var placementWork = false;
    do
    {
        var rndIndex = Math.round(Math.random()*(directions.length-1));
        directionToCheck = directions[rndIndex];
        directions.splice(rndIndex, 1);
        checks++;
        if(origin.x >= 0 && origin.y >= 0 && origin.y < nbCol && origin.x < nbCol)
            placementWork = (checkPlacement2(word, origin, directionToCheck));
    } while ((!placementWork) && (checks < directions.length));
    if(placementWork)
        placeWordAt(word, origin, directionToCheck);
    return placementWork;
}

function checkPlacement2(word, origin, direction)
{
    var x = origin.x;
    var y = origin.y;
    var numberOfCells = word.length;
    var numberOfVoidCells = 0;
    switch(direction)
    {
        case 0: // Top
            for(var i = 0; i < numberOfCells; i++)
            {
                if(y-i >= 0 && y-i < nbLines)
                {
                    if(boardLetters[x][parseInt(y)-parseInt(i)] == "0" || boardLetters[x][parseInt(y)-parseInt(i)] == word[i])
                        numberOfVoidCells++;
                }
                else
                    break;
            }
            break;
        case 1: // Bottom
            for(var i = 0; i < numberOfCells; i++)
            {
                if(y+i >= 0 && y+i < nbLines)
                {
                    if(boardLetters[x][parseInt(y)+parseInt(i)] == "0" || boardLetters[x][parseInt(y)+parseInt(i)] == word[i])
                        numberOfVoidCells++;
                }
                else
                    break;
            }
            break;
        case 2: // Left
            for(var i = 0; i < numberOfCells; i++)
            {
                if(x-i >= 0 && x-i < nbCol)
                {
                    if(boardLetters[x-i][y] == "0" || boardLetters[x-i][y] == word[i])
                        numberOfVoidCells++;
                }
                else
                    break;

            }
            break;
        case 3: // Right
            for(var i = 0; i < numberOfCells; i++)
            {
                if(x+i >= 0 && x+i < nbCol)
                {
                    if(boardLetters[x+i][y] == "0" || boardLetters[x+i][y] == word[i])
                        numberOfVoidCells++;
                }
                else
                    break;
            }
            break;
        default:
            break;
    }
    return (numberOfVoidCells == numberOfCells);
}

function SelectXWords(nbWords)
{

    for(var i = 0; i < nbWords; i++)
    {
        if(dictionnary.length >= 1)
        {
            var rnd = Math.round(Math.random()*dictionnary.length-1);
            if(dictionnary[rnd] != null && dictionnary[rnd] != "")
            {
                if(dictionnary[rnd].length <= nbCol)
                    wordList.push(dictionnary[rnd]);
            }

            dictionnary.splice(rnd, 1);
        }
        else
            break;
    }
}

/* Modifier le jeu: PREMIER NOMBRE : Nombre de lignes & Colonnes //// DEUXIEME NOMBRE: Nombre de mots à trouver */
GameModifier(10, 10);
/* */

SelectXWords(nbGridWords);
GenerateBoardLetters();
TryToPlaceDictionnary();
WriteList();
Replace0ByRandomLetters();
GenerateBoard();