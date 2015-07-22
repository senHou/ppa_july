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
   include ('connection.php') ;
   $connection  = new Connection();
   $connection->connect();
   if ($_SESSION['valid'] == true)
   {
      echo $_SESSION['name']." Selection Summary"; 
      $records = $connection->getRecordByName($_SESSION['name']);
      if ($records != null)
      {
         echo"<table align = 'center'border = '1' class = 'head'>";
         echo"<tr><th>Game</th><th>Winner</th></tr>";
         for ($i = 0; $i < count($records); $i ++)
         {
            $gameId = $records[$i]->getGameId();
            $peopleName = $records[$i]->getPeopleName();
            $teamName = $records[$i]->getTeamName();
            $game = $connection->getWeeklyGameById($gameId,5);
            $team1 = $game->getTeam1();
            $team2 = $game->getTeam2();
         
            echo"
               <tr>
                  <td>$team1 VS $team2</td>
                  <td>$teamName</td>
               </tr>
            ";
         }  
         echo"</table>";
         echo"<a href = './viewall.php'>View all selection</a>";
      }
      else
      {
         echo"<p class = 'head'>You currently have no record.<a href = './selection.php'>Make Selection</p>";
      }
   }
   else
   {
      echo "Sorry. Please login first.";
   }  
?>
</head>
</body>
