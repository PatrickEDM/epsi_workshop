

var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
var wordSelectionEnabled = false;
var currentWord = "";
var currentWordCells = [];
var horizontalLine = false;
var verticalLine = false;
var mobileDevice = false;
var nbCol = 12;
var nbLines = 12;
var boardLetters = [[]];


function DetectionMobile()
{
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    if(isMobile.any())
        mobileDevice = true;
}
DetectionMobile();

function GenerateBoard()
{
    $('.screen').append('<div><table id="board" class="board"></table></div>');
    var board = $('#board');
    var num = 0;
    for(var i = 0; i < nbLines; i++)
    {
        board.append('<tr class="ligne-'+i+'"></tr>');
        for(var j = 0; j < nbCol; j++)
        {
            var td = '<td class="cell cell-'+i+'-'+j+'" pos_y="'+i+'" pos_x="'+j+'">'+boardLetters[i][j]+'</td>';
            $('.ligne-'+i).append(td);
            num++;
        }
    }
    $('.cell').bind("mousedown", mouseDown);
    $('.cell').bind("mouseover touch", mouseOver);
    $(document).bind("mouseup", mouseUp);
}

function stopWordSelection()
{
    wordSelectionEnabled = false;
    horizontalLine = false;
    verticalLine = false;
}

function ReinitialiseCells()
{
    $(".selected").removeClass("selected");
    $(".rightcell").removeClass("rightcell").addClass('foundedcell');
    $(".wrongcell").removeClass("wrongcell");
}

function CellsAreAdjacents(cell1, cell2)
{
    var adjacent = false;
    if(($(cell2).attr('pos_x') == ($(cell1).attr('pos_x')-1)) && ($(cell1).attr('pos_y') == $(cell2).attr('pos_y')))
        adjacent = true;
    if(($(cell2).attr('pos_x') == (parseInt($(cell1).attr('pos_x'))+1)) && ($(cell1).attr('pos_y') == $(cell2).attr('pos_y')))
        adjacent = true;
    if(($(cell2).attr('pos_y') == ($(cell1).attr('pos_y')-1)) && ($(cell1).attr('pos_x') == $(cell2).attr('pos_x')))
        adjacent = true;
    if(($(cell2).attr('pos_y') == (parseInt($(cell1).attr('pos_y'))+1)) && ($(cell1).attr('pos_x') == $(cell2).attr('pos_x')))
        adjacent = true;
    return adjacent;
}

function CellsAreOnTheVerticalAxis(cell1, cell2)
{
    return ($(cell1).attr('pos_x') == $(cell2).attr('pos_x'));
}

function CellsAreOnTheHorizontalAxis(cell1, cell2)
{
    return ($(cell1).attr('pos_y') == $(cell2).attr('pos_y'));
}


