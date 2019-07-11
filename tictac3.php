<!DOCTYPE html>
<html lang="en">
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  
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


    </style>


    <title>Tic tack toe</title>
</head>
<body>
    
    <h1 class="centeredText">Tick Tack Toe</h1>
    <h3 class="centeredText status">Player 1 Turn</h3>
    <div class="board">
    <div class="row">
    <div align= "center">
    <table border= "1px solid black"; width = "50%" ; height = "50%" class= "centeredText">
        <tr>
          <td class="item" data-index="0">
            <p class="content ">A</p>
          </td>
        
        
       
          <td class="item" data-index="1">
            <p class="content ">B</p>
          </td>
       
        
          <td class="item" data-index="2">
            <p class="content ">C</p>
          </td>
       
      </tr>

      <tr>
       
          <td class="item" data-index="3">
            <p class="content ">E</p>
          </td>
        
       
          <td class="item" data-index="4">
            <p class="content ">F</p>
          </td>
       
       
          <td class="item" data-index="5">
          <p class="content ">G</p>
          </td>
      
      </tr>

      <tr>
       
          <td class="item" data-index="6">
            <p class="content ">H</p>
          </td>
      
          <td class="item" data-index="7">
            <p class="content ">I</p>
          </td>
      
          <td class="item" data-index="8">
            <p class="content ">J</p>
          </td>

    </tr>
</table>
</div>
    </div>
  </div>
  

  </body>
  <script>
    $(document).ready(function(){
  
  var pressedindex;
  var pressedelement;
  var status = $('.centeredText').filter('.status');

  $('.item').on('click',function(){
    pressedelement = $(this);
    pressedindex = pressedelement.data('index');
 
    if(winner() === false){
 
      if(validmove(pressedindex)){
  
        var marker = boardmarker(pressedindex);
        pressedelement.find('.content').text(marker);
       
        nextplayerturn();
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

function nextplayerturn(){
  if(turn){
    turn = false;
  } else {
    turn = true;
  }
  return turn;
}

function boardmarker(index){

  if(turn){
    board[index] = "X";
    return "X";
  } else {
    board[index] = "O";
    return "O";
  }
}

function winner(){

  var top = board[0];
  var middle = board[3];
  var bottom = board[6];
  var winner = false;

  if(board[1] === top && board[2] === top && top != undefined){
    winner = true;
  } else if (board[4] === middle && board[5] === middle && middle != undefined){
    winner = true;
  } else if(board[7] === bottom && board[8] === bottom && bottom != undefined){
    winnder = true;
  } else if(board[3] === top && board[6] === top && top != undefined){
    winner = true;
  } else if(board[4] === board[1] && board[7] === board[1] && board[1] != undefined){
    winner = true;
  } else if(board[5] === board[2] && board[8] === board[2] && board[2]){
    winner = true;
  } else if(board[4] === top && board[8] === top && top != undefined){
    winner = true;
  } else if(board[4] === board[2] && board[6] === board[2] && board[2] != undefined){
    winner = true;
  } else {
    winner = false;
  }
  return winner;
}
function gameover(){

}

function validmove(index){
  if(board[index] === undefined){
    return true;
  } else {
    return false;
  }
}
  </script>
  </html>