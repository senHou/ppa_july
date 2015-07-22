<?php
   session_start();
?>

<html>
<head>
   <title>Summary</title> 
      <link rel="stylesheet" type="text/css" href="mystyles.css" />
</head>
<body>
<?php 
   if ($_SESSION['valid'] == true)
   {
      echo'<h1 class = "head">PPA July Intake AFL</h1>';
      include ('connection.php');
      $connection = new Connection();
      $connection->connect();
      $gameId = $_GET['id'];
      $game = $connection->getWeeklyGameById($gameId,5);
      $team1 = $game->getTeam1();
      $team2 = $game->getTeam2();
      echo "<p>All summary for $team1 and $team2.</p>";
      $teamOneSupporter = $connection->getTeamSupporter($gameId,$game->getTeam1());
      $teamTwoSupporter = $connection->getTeamSupporter($gameId,$game->getTeam2());
      $max = 0;
      if (count($teamOneSupporter) > count($teamTwoSupporter))
      {
         $max = count($teamOneSupporter);
      }
      else
      {
         $max = count($teamTwoSupporter);
      }
      echo"<table class = 'head' align = 'center' border = '1'>";
      echo"<tr><th>$team1</th><th>$team2</th></tr>";
      for($i = 0; $i < $max; $i ++)
      {
         echo"<tr>";
         if (count($teamOneSupporter) > $i && count($teamTwoSupporter) > $i)
         {
            echo"<td width = '150'>$teamOneSupporter[$i]</td>";
            echo "<td width = '150'>$teamTwoSupporter[$i]</td>";
         }

         if (count($teamOneSupporter) > $i && count($teamTwoSupporter) <= $i)
         {
            echo"<td width = '150'>$teamOneSupporter[$i]</td>";
            echo "<td width = '150'>NULL</td>";
         }

         if (count($teamOneSupporter) <= $i && count($teamTwoSupporter) > $i)
         {
            echo"<td width = '150'>NULL</td>";
            echo "<td width = '150'>$teamTwoSupporter[$i]</td>";
         }
      }
      $num1 = count($teamOneSupporter);
      $num2 = count($teamTwoSupporter);
      echo"</tr>";
      echo"<tr>";
      echo "<td>$num1</td>";
      echo"<td>$num2</td>";
      echo"</tr>";
      echo"</table>";
      echo "<a href = './view.php'>View your selection</a>";
   }
   else
   {
      echo "Sorry. Please login first.";
   }

?>

</body>
</html>

