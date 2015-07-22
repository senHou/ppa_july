<?php
   session_start();
?>
<html>
<head>
   <title>Welcome</title> 
      <link rel="stylesheet" type="text/css" href="mystyles.css" />
      <script type = "text/javascript" src = "./selection.js"></script>
</head>

<body>
   <h1 class = "head">PPA July Intake AFL</h1>
<?php
   include ('connection.php') ;
   $connection  = new Connection();
   $connection->connect();
   if ($_SESSION['valid'])
   {
      $status = $connection->getStatus($_SESSION['name']);

      if($status == 0)
      {
         $games = $connection->getWeeklyGame(5);
         $num = count($games);
         echo"Make selection and all the best!";
         echo"<table  align = 'center' class = 'head'border = '0'>
            <form onsubmit = 'return checkSelection($num);' action = 'summary.php' method = 'post' name = 'team'>";
         for($i = 0; $i< $num; $i ++)
         {
            $team1 = $games[$i]->getTeam1();
            $team2 = $games[$i]->getTeam2();
            $name = "game".$i;
            echo"
               <tr>
                  <td>
                     <input type= 'radio' id = \"$name\"  name= \"$name\" value = \"$team1\">$team1 
                  </td>
                  <td>VS</td> 
                  <td align = 'right'>
                     $team2<input type='radio' id = \"$name\" name = \"$name\" value=\"$team2\" />
                  </td>
               </tr>
               <tr></tr>
            ";
         }  
         echo"<tr><td colspan='3' align='right'><input style='width:100' type = 'submit' name = 'submit' value = 'Submit'>";
         echo"</form></table>";
      }
      else
      {
         echo"<p class = 'head'>You have already made your selection. <a href = './view.php'>View your selection</a></p>";
      }  
   }
   else
   {
      echo "Sorry. Login first.<a href = './index.html'>Go back</a>";
      exit;
   }  
?>
</body>
</html>
