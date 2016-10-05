
function mouseDown()
{
    if(!mobileDevice)
    {
        ReinitialiseCells();
        currentWord = "";
        currentWordCells = [];
        wordSelectionEnabled = true;
        currentWord += $(this).text();
        currentWordCells.push($(this));
        $(this).addClass("selected");
        VerifyWord(false);
    }
}

function mouseOver()
{
    if(mobileDevice && !wordSelectionEnabled)
    {
        ReinitialiseCells();
        currentWord = "";
        currentWordCells = [];
        wordSelectionEnabled = true;
        currentWord += $(this).text();
        currentWordCells.push($(this));
        $(this).addClass("selected");
        VerifyWord(false);
    }
    else if(wordSelectionEnabled)
    {
        var countThisCell = false;
        if(CellsAreAdjacents(currentWordCells[currentWordCells.length-1], $(this)))
        {
            if(currentWordCells.length == 1)
            {
                countThisCell = true;
                horizontalLine = (CellsAreOnTheHorizontalAxis(currentWordCells[currentWordCells.length-1], $(this)));
                verticalLine = (CellsAreOnTheVerticalAxis(currentWordCells[currentWordCells.length-1], $(this)));
            }
            else
            {
                if(horizontalLine)
                    countThisCell = (CellsAreOnTheHorizontalAxis(currentWordCells[currentWordCells.length-1], $(this)));
                if(verticalLine)
                    countThisCell = (CellsAreOnTheVerticalAxis(currentWordCells[currentWordCells.length-1], $(this)));
            }
        }
        if(countThisCell)
        {
            $(this).addClass("selected");
            currentWord += $(this).text();
            currentWordCells.push($(this));
            VerifyWord(false);
        }
        else
        {
            VerifyWord(true);
        }
    }
}

function mouseUp()
{
    if(wordSelectionEnabled && !mobileDevice)
        VerifyWord(true);
}
