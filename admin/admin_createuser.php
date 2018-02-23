<?php
   require_once('phpscripts/config.php');
   // confirm_logged_in();
   if(isset($_POST['submit'])){
     $fname = trim($_POST['fname']);
     $username = trim($_POST['username']);
     $email = trim($_POST['email']);
     $lvllist = $_POST['lvllist'];
     if(empty($lvllist)){
       $message = "Please select the user level.";

     }else {
       $result = createUser($fname, $username, $email, $lvllist);
       $message = $result;
     }}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen">
<title>Welcome to the admin panel login</title>
</head>
<body>
  <h2>Create User</h2>
  <?php if(!empty($message)){ echo $message;} ?>
  <form action="admin_createuser.php" method="post">
    <label class="detail1">First Name:</label>
    <input class="input1" type="text" name="fname" value="">
    <label class="detail1">Username:</label>
    <input class="input1" type="text" name="username" value="">
    <label class="detail1">Email:</label>
    <input class="input1" type="text" name="email" value="">
    <select class="selector" name="lvllist">
      <option class="selector" value="">select the  user level</option>
      <option class="selector" value="2">Web Admin</option>
      <option class="selector" value="1">Web Master</option>
    </select>
    <input class="submit1" type="submit" name="submit" value="Create User">
    </form>

</body>
</html>
