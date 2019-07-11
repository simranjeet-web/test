<html>
<head>
<title>Tic Tac Toe
</title>
<style>
body {
  font-family:"Roboto", Arial, sans-serif;
  margin:0 auto;
  text-align:center;
  margin-top:50px;
  color:#FFF;
  text-shadow:-1px -1px #333;
  background:white;
  h1 {
    font-weight:normal;
  }
  .turn {
    margin-bottom:10px;
  }
  table {
    border-collapse:collapse;
    width:150px;
    margin:0 auto;
    td {
      width:50px;
      height:50px;
      border:1px solid #555;
      cursor:pointer;
      &:before {
        font-size:1.5em;
        line-height:1;
      }
      &.cross:before {
        content:"x";
        color:lightblue;
      }
      &.circle:before {
        content:"o";
        color:pink;
      }
    }
  }
  .reset {
    background:#555;
    border:1px solid #333;
    padding:5px 10px;
    color:#FFF;
    cursor:pointer;
    font-family:"Roboto", Arial, sans-serif;
    text-transform:uppercase;
    &:hover {
      opacity:0.8;
    }
  }
}

</style>
</head>
<body>
<div align = "center">
<div class= "message"> </div>
<div class= "turn"> </div>
<table border= "1px solid black"; width = "50%" ; height = "50%">

	<tr>
		<td class = "item1"> </td>
		<td class = "item2"> </td>
		<td class = "item3"> </td>
	</tr>
	<tr>
		<td class = "item4"> </td>
		<td class = "item5"> </td>
		<td class = "item6"> </td>
	</tr>
	<tr>
		<td class = "item7"> </td>
		<td class = "item8"> </td>
		<td class = "item9"> </td>
	</tr>
</table>
<input type = "button" value = "reset" class = "reset">
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
  
  var player = 1;
  var table = $('table');
  var messages = $('.messages');
  var turn = $('.turn');
  displayNextPlayer(turn, player);
  
  $('td').click(function() {
  	//alert("hello");
    td = $(this);
    var state = getState(td);
    if(!state) {
      var pattern = definePatternForCurrentPlayer(player);
      changeState(td, pattern);
      if(checkIfPlayerWon(table, pattern)) {
        messages.html('Player '+player+' has won.');
        turn.html('');
      } else {
        player = setNextPlayer(player);
        displayNextPlayer(turn, player);
      }
    } else {
      messages.html('This box is already checked.');
    }
  });
  
  $('.reset').click(function() {
    player = 1;
    messages.html('');
    reset(table);
    displayNextPlayer(turn, player);
  });
  
});

function getState(td) {
  if(td.hasClass('cross') || td.hasClass('circle')) {
    return 1;
  } else {
    return 0;
  }
}

function changeState(td, pattern) {
  return td.addClass(pattern);
}

function definePatternForCurrentPlayer(player) {
  if(player == 1) {
    return 'cross';
  } else {
    return 'circle';
  }
}

function setNextPlayer(player) {
  if(player == 1) {
    return player = 2;
  } else {
    return player = 1;
  }
}

function displayNextPlayer(turn, player) {
  turn.html('Player turn : '+player);
}

function checkIfPlayerWon(table, pattern) {
  var won = 0;
  if(table.find('.item1').hasClass(pattern) && table.find('.item2').hasClass(pattern) && table.find('.item3').hasClass(pattern)) {
    won = 1;
  } else if (table.find('.item1').hasClass(pattern) && table.find('.item4').hasClass(pattern) && table.find('.item7').hasClass(pattern)) {
    won = 1;
  } else if (table.find('.item1').hasClass(pattern) && table.find('.item5').hasClass(pattern) && table.find('.item9').hasClass(pattern)) {
    won = 1;
  } else if (table.find('.item4').hasClass(pattern) && table.find('.item5').hasClass(pattern) && table.find('.item6').hasClass(pattern)) {
    won = 1;
  } else if (table.find('.item7').hasClass(pattern) && table.find('.item8').hasClass(pattern) && table.find('.item9').hasClass(pattern)) {
    won = 1;
  } else if (table.find('.item2').hasClass(pattern) && table.find('.item5').hasClass(pattern) && table.find('.item8').hasClass(pattern)) {
    won = 1;
  } else if (table.find('.item3').hasClass(pattern) && table.find('.item6').hasClass(pattern) && table.find('.item9').hasClass(pattern)) {
    won = 1;
  } else if (table.find('.item3').hasClass(pattern) && table.find('.item5').hasClass(pattern) && table.find('.item7').hasClass(pattern)) {
    won = 1;
  }
  return won;
}

function reset(table) {
  table.find('td').each(function() {
    $(this).removeClass('circle').removeClass('cross');
  });
}
</script>
</html>
