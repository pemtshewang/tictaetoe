<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script charset="utf-8" language="javascript">
        let playerX=[];
        let playerO=[];
        let player=1;
        let count=0;
        let win=false;
        //Player's 1 turn
        const number={
            'one':1,
            'two':2,
            'three':3,
            'four':4,
            'five':5,
            'six':6,
            'seven':7,
            'eight':8,
            'nine':9
        }
        function readonly()
        {
            for (attribute in number)
            {
                document.getElementById(attribute).setAttribute('onclick','');
            }
        }
        function checkPos(array)
        {
            if(array.includes(1)&&array.includes(2)&&array.includes(3))//upper horizontal
            {
                return true;
            }else if(array.includes(1)&&array.includes(4)&&array.includes(7))//left vertical
            {
                return true;
            }else if(array.includes(2)&&array.includes(5)&&array.includes(8)){//mid vertical
                return true;
            }else if(array.includes(3)&&array.includes(6)&&array.includes(9))//right vertical
            {
                return true;
            }else if(array.includes(1)&&array.includes(5)&&array.includes(9))//diagonal
            {
                return true;
            }else if(array.includes(7)&&array.includes(8)&&array.includes(9)){//low horizontal
                return true;
            }else if(array.includes(4)&&array.includes(5)&&array.includes(6)){//mid horizontal
                return true;
            }else{
                return false;
            }
        }
        //function to check the winner of the game;
        function checkTheWinner(playerX,playerO)
        {
            if(checkPos(playerX))
            {
                win=true;
                document.getElementById('playerX').style.backgroundColor = 'yellow';
                document.getElementById('playerO').style.backgroundColor = 'white';
                document.getElementById('playerX').setAttribute('value','Player X wins');
                readonly();
            }
            if(checkPos(playerO))
            {
                win=true;
                document.getElementById('playerO').style.backgroundColor = 'yellow';
                document.getElementById('playerX').style.backgroundColor = 'white';
                document.getElementById('playerO').setAttribute('value','Player O wins');
                readonly();
            }
            if(count == 9 && win==false)
            {
                window.location.reload();
            }
        }
        function reload()
        {
            window.location.reload();
        }
        function markme(position)
        {
            if(player%2 != 0)
            {
                playerO.push(number[position]);
                correctMarker(position);
                document.getElementById('playerX').style.backgroundColor = 'green';
                document.getElementById('playerO').style.backgroundColor = 'white';
                count++;
            }else{
                playerX.push(number[position]);
                wrongMarker(position);
                document.getElementById('playerO').style.backgroundColor = 'green';
                document.getElementById('playerX').style.backgroundColor = 'white';
                count++;
            }
            player++;
            if(count>4)//if there is more than 4 cells marked 
            {
                checkTheWinner(playerX,playerO);
            }
        }
        function correctMarker(position)
        {
            document.getElementById(position).style.background = "url(./right.jpg) center center no-repeat";
        }
        function wrongMarker(position)
        {
            document.getElementById(position).style.background="url(./wrong.png) center center no-repeat";
        }
    </script>
    <style type="text/css" media="screen">
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
       .container{
        display:grid;
        grid-template-rows:repeat(3,150px);
        grid-template-columns:repeat(3,1fr);
        }
       .container div{
           border-style: groove;
           border-color: red;
           padding:50px;
       }
       .container{
           height: 500px;
           width: 500px;
           margin: 0 auto;
           border-style: groove;
           border-radius: 5px;
           border-width: 10px;
       }
       h1,h4{
           font-family:'Press Start 2P', cursive;
           color: green;
           text-align:center;
           text-decoration: underline overline;
       }
       body{
           padding-top: 50px;
       }
       #playerO{
           background-color: green;
        }
       input,button{
           font-family:'Press Start 2P', cursive;
           font-size:8px;
        }
    </style>
</head>
<body>
    <h1>Tic Tae Toe</h1>
   <div class="container">
       <div onclick="markme('one')" id="one" name="click">
       </div>
<div onclick="markme('two')" id="two" name="click">
       </div>
<div onclick="markme('three')" id="three" name="click">
       </div>
<div onclick="markme('four')" id="four" name="click">
       </div>
<div onclick="markme('five')" id="five" name="click">
       </div>
<div onclick="markme('six')" id="six" name="click">
       </div>
<div onclick="markme('seven')" id="seven" name="click">
       </div>
<div onclick="markme('eight')" id="eight" name="click">
       </div>
<div onclick="markme('nine')" id="nine" name="click">
       </div>
       <input type='submit' id="playerX" readonly value="Player X"><button id="reset" onclick="reload()">Restart</button><input type="submit" id="playerO" readonly value="Player O">
   </div> 
</body>
</html>
