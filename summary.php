<?php
   session_start();
?>

<html>
<head>
   <title>Summary</title> 
      <link rel="stylesheet" type="text/css" href="mystyles.css" />
</head>
<body>
   <h1 class = "head">PPA July Intake AFL</h1>
<?php 
   if ($_SESSION['valid'] == true)
   {
      include ('connection.php');
      $connection = new Connection();
      $connection->connect();
      $games = $connection->getWeeklyGame(5); 
      $num = $connection->getNumberOfGames(5);
      echo"You Selection Summary";
      echo"<table align = 'center' class = 'head' border = '1'>";
      echo"<tr aligh = 'center'>
            <th>Game</th>
            <th>Winner</th>
      </tr>";
      for ($i = 0; $i < $num; $i ++)
      {
         $gameId = $games[$i]->getGameId();
         $name = "game".$i;
         $team = $_POST[$name];
         $team1 = $games[$i]->getTeam1();
         $team2 = $games[$i]->getTeam2();
         echo"
            <tr>
               <td>$team1   VS   $team2</td>
               <td>$team</td>
            </tr>";
         $connection->addRecord($gameId,$_SESSION['name'],$team,5); 
      }
      $connection->updateStatusByName($_SESSION['name']);
      echo"</table>";
      echo"<a class = 'move' href = './view.php'>View your selection</a>";
      echo"<a href = './viewall.php'>View all selection</a>";
   }
   else
   {
      echo "please login first.";
      exit;
   }
?>
</body>
</html>
