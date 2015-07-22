<?php
   session_start();
   if (!isset($_SESSION['valid']) || !isset($_SESSION['name'])){
      header("Location: ./index.html");
   }  
?>

<html>
<head>
   <title>Change Password</title> 
      <link rel="stylesheet" type="text/css" href="mystyles.css" />
      <script type = "text/javascript" src = "./password.js"></script>
</head>
<body>
   <h1 class = "head">PPA July Intake AFL</h1>
<?php 
   if ($_SESSION['valid'] == true)
   {
      include ('connection.php');
      $connection = new Connection();
      $connection->connect();
      echo "<p>Change Password</p>";
      echo "<table class = 'head' align = 'center' >";
      echo "<form action = 'changed.php' method = 'post' onsubmit = 'return checkPassword();'>";
      echo "
            <tr>
               <td>New Password:</td>
               <td><input type = 'password' name = 'password' id = 'password' /></td>
            </tr>
            <tr>
               <td>Re-Enter:</td>
               <td><input type = 'password' name = 'retry' id = 'retry' /></td>
            </tr>

            <tr>
               <td colspan = '2'><input type = 'submit' value = 'Submit' /></td>
            </tr>
      ";
      echo "</table>";

      echo "<a href = ./logout.php>logout</a>";
   }
   else
   {
      echo "Sorry, Please login first. <a href = 'index.html'>Go back</a>";
   }     
?>
