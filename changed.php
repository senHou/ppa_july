<?php
   session_start();
   if (!isset($_SESSION('valid')) && !isset($_SESSION['name'])){
      header("Location: ./login.html");
   }  
   if ($_SESSION['valid'] == true)
   {
      include ('connection.php');
      $connection = new Connection();
      $connection->connect();
      $password = $_POST['password'];
      $connection->updatePassword($_SESSION['name'],$password);
      echo "You password have been changed.<br/>";
      echo "Please Login again with your new password.<a href = './index.html'>Login</a>";
      echo "<a href = './logout.php'>logout</a>";
   }
   else
   {
      echo "Sorry. Please login first. <a href = './index.html'>Login</a>";
   }
?> 
