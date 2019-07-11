<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="styling.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="logic.js"></script>
    <style>
      .centeredText{
  text-align:center;
  padding:0;
  margin:0;
}
.board{
  padding:1%;
}

.takeFullSize{
  display: block;
  width:100%;
  height:10%;
}
    </style>


    <title>Tic tack toe</title>
</head>
<body>
  <div class="container-fluid">
    <h1 class="centeredText">Tick Tack Toe</h1>
    <h3 class="centeredText status">Player 1 Turn</h3>
    <div class="board">
    <div class="row">
      <!-- Start of Row 1 -->
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="0">
            <p class="contentOfWell centeredText">A</p>
          </div>
        </div>
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="1">
            <p class="contentOfWell centeredText">B</p>
          </div>
        </div>
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="2">
            <p class="contentOfWell centeredText">C</p>
          </div>
        </div>
      <!-- End of Row 1 -->

      <!-- Start of Row 2 -->
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="3">
            <p class="contentOfWell centeredText">E</p>
          </div>
        </div>
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="4">
            <p class="contentOfWell centeredText">F</p>
          </div>
        </div>
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="5">
          <p class="contentOfWell centeredText">G</p>
          </div>
        </div>
      <!-- End of Row 2 -->

      <!-- Start of Row 3 -->
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="6">
            <p class="contentOfWell centeredText">H</p>
          </div>
        </div>
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="7">
            <p class="contentOfWell centeredText">I</p>
          </div>
        </div>
        <div class="col-xs-4 col-lg-4">
          <div class="well" data-index="8">
            <p class="contentOfWell centeredText">J</p>
          </div>
        </div>
      <!-- End of Row 3 -->
    </div>
  </div>
  </div>
  </body>
  <script>
    $(document).ready(function(){
  // true = player 1
  // false = player 2
  var pressedIndex;
  var pressedElement;
  var status = $('.centeredText').filter('.status');

  $('.well').on('click',function(){
    pressedElement = $(this);
    pressedIndex = pressedElement.data('index');
    //Check if the game is in progress
    if(isWinner() === false){
      //Check if the move is legal
      if(isMoveValid(pressedIndex)){
        // Add the marker (O/X) to UL and array
        var marker = addMarkerToBoard(pressedIndex);
        pressedElement.find('.contentOfWell').text(marker);
        // Next player turn
        nextPlayerTurn();
        if(turn){
          status.text("Player 1 - X Turn")
        } else {
          status.text("Player 2 - O Turn");
        }
      } else {
        status.text("Invalid Move!");
      }
    } else {
      status.text("Game over");
    }
  });

  });
    var turn = true;
var board = [];
var messageToUser;

function nextPlayerTurn(){
  if(turn){
    turn = false;
  } else {
    turn = true;
  }
  return turn;
}

function addMarkerToBoard(index){
  // true - player 1 is a X
  // false - player 2 is a O
  if(turn){
    board[index] = "X";
    return "X";
  } else {
    board[index] = "O";
    return "O";
  }
}

function isWinner(){
  // X | X | X
  // X | X | X
  // x | X | X

  var top = board[0];
  var middle = board[3];
  var bottom = board[6];
  var winner = false;

  //Not good code since at the start the array indexes are all undefined so it will return true.
  // Fixed by not allowing some spaces to be undefined
  //1. Horizontal Rows
  if(board[1] === top && board[2] === top && top != undefined){
    winner = true;
  } else if (board[4] === middle && board[5] === middle && middle != undefined){
    winner = true;
  } else if(board[7] === bottom && board[8] === bottom && bottom != undefined){
    winnder = true;
  //2. Vertical Rows
  } else if(board[3] === top && board[6] === top && top != undefined){
    winner = true;
  } else if(board[4] === board[1] && board[7] === board[1] && board[1] != undefined){
    winner = true;
  } else if(board[5] === board[2] && board[8] === board[2] && board[2]){
    winner = true;
  //3. Across
} else if(board[4] === top && board[8] === top && top != undefined){
    winner = true;
  } else if(board[4] === board[2] && board[6] === board[2] && board[2] != undefined){
    winner = true;
  } else {
    winner = false;
  }
  return winner;
}
function isGameOver(){

}

function isMoveValid(index){
  // So space is not take
  if(board[index] === undefined){
    return true;
  } else {
    return false;
  }
}
  </script>
  </html>