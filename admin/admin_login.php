<?php
   require_once('phpscripts/config.php');
   $ip = $_SERVER['REMOTE_ADDR'];
   // echo $ip;
   if(isset($_POST['submit'])){
   // echo "works";
     $username = trim($_POST['username']);
     $password = trim($_POST['password']);
     if($username !== "" && $password !== ""){
       $result = logIn($username, $password, $ip);
       $message = $result;
     }else{
       $message = "Plaease fill out the required fills!";

     }
   }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen">
<title>Welcome to the admin panel login</title>
</head>
<body>
  <?php if(!empty($message)){echo $message;}?>

  <form action="admin_login.php" method="post">
    <label class="detail1">Username:</label>
    <input class="input1" type="text" name="username" value="">

    <labe class="detail1">Password:</label>
    <input class="input1" type="password" name="password" value="">

    <br>
    <input class="submit1" type="submit" name="submit" value="SUBMIT">
  </form>

</body>
</html>
