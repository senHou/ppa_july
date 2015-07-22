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

      echo "Click a game that you want to see the summary.";
      for($i = 0; $i < count($games); $i ++)
      {
         $team1 = $games[$i]->getTeam1();
         $team2 = $games[$i]->getTeam2();
         $gameId = $games[$i]->getGameId();
         echo"<p><a href = './teamsummary.php?id=$gameId'>$team1 VS $team2</a></p>";

      }

   }
   else
   {
      echo "Sorry. Please login first.";
   }
?>

</body>
</html>
