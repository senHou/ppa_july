<?php
ini_set('display_errors', '1');
include ('game.php');
include ('record.php');
class Connection
{
   public $dbhost = "localhost";
   public $username = "root";
   public $password = "root";
   public $dbname = "Footy";

   public function connect()
   {
      $connection = mysql_connect($this->dbhost,$this->username,
                                  $this->password);
      if(!$connection)
      {
         echo "Can not connect to database";
         exit;
      }
      else if (!mysql_select_db($this->dbname,$connection))
      {
         echo "Can not connect to database";
         exit;
      }
      else
      {
         return $connection;
      }
   }

   public function checkLogIn($name,$password)
   {
      $query = "select * from people where name = '$name' and password = '$password'";
      $result = mysql_query($query);
      $num = mysql_num_rows($result);
      if ($num == 0)
      {
         return false;
      }
      else
      {  
         return true;
      }
   }

   public function getWeeklyGame($week)
   {
      $query = "select * from game where week_no = $week";
      $result = mysql_query($query);
      $i = 0;
      if ($result)
      {
         while($row = mysql_fetch_assoc($result))
         {
            $game = new Game($row['id'],$row['team_one'],$row['team_two'],$row['week_no']);

             $games[$i] = $game;
             $i ++;
         }
         
         return $games;
      }
      else
      {
         return null;
      }
   }
   
   public function getWeeklyGameById($id,$week)
   {
      $query = "select * from game where week_no = $week and id = $id";
      $result = mysql_query($query);
      $i = 0;
      if ($result)
      {
         if($row = mysql_fetch_assoc($result))
         {
            $game = new Game($row['id'],$row['team_one'],$row['team_two'],$row['week_no']);
            return $game;
         }
      }
      else
      {
         return null;
      }
   }

   public function getNumberOfGames($weekNo)
   {
      $query = "select * from game where week_no = $weekNo";
      $result = mysql_query($query);
      $num = mysql_num_rows($result);
      return $num;
   }
   
   public function addRecord($gameId,$peopleName,$teamName,$weekNo)
   {
      $query = "insert into record (game_id,people_name,team_name,week_no) values ($gameId,'$peopleName','$teamName',$weekNo)";
      mysql_query($query);
   }

   public function getRecordByName($name)
   {  
      $query = "select * from record where week_no = 5 and people_name = '$name'";
      $result = mysql_query($query);
      $i = 0;
      $num = mysql_num_rows($result);
      if ($num > 0)
      {
         while($row = mysql_fetch_assoc($result))
         {
            $record = new Record($row['game_id'],$row['people_name'],$row['team_name'],$row['week_no']);
            $records[$i] = $record;
            $i++;
         }  
         return $records;
      }
      else
      {
         return null;
      }
   }

   
   public function updateStatusByName($name)
   {
      $query = "update people set status = 1 where name = '$name'";
      mysql_query($query);
   }

   public function getStatus($name)
   {
      $query = "select status from people where name = '$name'";
      $result = mysql_query($query);
      
      if ($row = mysql_fetch_array($result,MYSQL_NUM))
      {
         return $row[0];
      }
      else
      {
         return null;
      }
   }
   
   public function getTeamSupporter($id,$team)
   {
      $query = "select people_name from record where team_name = '$team' and game_id = $id";
   
      $result = mysql_query($query);
      $i = 0;
      $supporters = array(); 
      while ($row = mysql_fetch_array($result,MYSQL_NUM))
      {
         $supporters[$i] = $row[0];
         $i ++;
      }

      return $supporters;
   }

   public function updatePassword($name, $password)
   {
      $query = "update people set password = '$password' where name = '$name'";
      mysql_query($query);
   }
}
?>
