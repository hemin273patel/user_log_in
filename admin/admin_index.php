<?php
   require_once('phpscripts/config.php');
   confirm_logged_in();



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to the admin panel login</title>
</head>
<body>
<?php
      echo $_SESSION['user_name'];
      echo "\nWelcome to our page.";


      date_default_timezone_set('Canada/Eastern');
      $sethours = date("H");

      if ($sethours < "12") {
          echo "Good morning";
      } else

      if ($sethours >= "12" && $sethours < "18") {
          echo "Good afternoon";
      } else

      if ($sethours >= "18" && $sethours < "24") {
          echo "Good Night";
      }


 ?>

</body>
</html>
