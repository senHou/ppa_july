<?php
   session_start();
?>

<html>
<head>
   <title>Welcome</title>
   <link rel="stylesheet" type = "text/css" href="mystyles.css"/>
   
</head>
<body>
   <h1 class = "head">PPA July Intake AFL</h1>
<?php
   include ('connection.php') ;
   $connection  = new Connection();
   $connection->connect();
   $_SESSION['valid'] = false;
   
   $name = $_POST["name"];
   $password = $_POST['password'];
  
   $isLogin = $connection->checkLogIn($name,$password);   
   if ($isLogin)
   {
      $_SESSION['name'] = $name;
      $_SESSION['valid'] = true;
      echo "Welcome ".$name."<br/>";
      echo "<p class = 'head'><a href = './selection.php'>Make Selection</a></p>";
      echo "<br/>";
      echo "<p><a href = './view.php'>View You Selection</a></p>";
      echo "<br/>";
      echo "<p><a href = './viewall.php'>View All Selection</a></p>";
      echo "<br/>";
      echo "<p><a href = './changepassword.php'>Change password</p></a>";
      echo "<a href = './logout.php'>log out </a>";
   }
   else
   {
      echo"Wrong username or password.<a href = './index.html'>Go back</a> and Try again.";
      exit;
   }
?>
</body>
</html>

