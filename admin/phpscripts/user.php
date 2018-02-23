<?php
   //This is the function to create new user in our database. For that we grab all the details whatever user has filled in the input; and, we grab it with the help of the POST method.
   function createUser($fname, $username, $email , $lvllist){
     //Must connect the files to the database
     include('connect.php');

     //This is the function which will generate the password automatically from the list of the alphabets.
     $password = randomPasswordGenerator();

     //This is the function to give a call to the function which send the mail to the Sign in user.
     $gettheDetailsMail = SendDetailsMail($username, $email, $password);

     //This is the most imporatant function which convert the password into the encrypted text format with the crypt() method of php.
     $encryptionPassword = crypt($password);

     //This is for the update of the database
     $userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$encryptionPassword}', '{$email}', NULL, '{$lvllist}', 'no')";

     //echo $userstring;
     $userquery= mysqli_query($link, $userstring);

     //After successful sign in user will redirect to the admin_index page for login
     if($userquery){
       redirect_to('admin_index.php');
     }else{
       $message = "You have broke your code in userstring or somewhere else, TRY AGAIN!";
       return $message;
     }

     mysqli_close($link);
   }

    // This is the function to send the username and password and php page link.
    function SendDetailsMail($username, $email, $password){
    //To get the email of user
    $to = $email;
    //Subject will appear as title in the mail.
    $subj = "This is the your confimation mail for the login in the movie site. Please do not reply.";
    //This will be the details which user will get in his mail.
    $messageCon =  "Email: ".$email."\n\nUsername: ".$username."\n\nPassword: ".$password."\n\nThis is the link for the your login page: ".'admin_login.php';
    //Send the mail to user.
    mail($to, $subj, $messageCon);
    }

    //This is the function to create the password generator.
    function randomPasswordGenerator() {
    //The whole set of the alphabets to generate the password.
    $alphabetSet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    //The array will be created to geerate the password
    $password = array();
    //strlen is the PHP documentation to get the lenth of the particular variable
    $alphaTotalNum = strlen($alphabetSet) - 1;
    //For loop will create the password of 9 letter or less number.
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaTotalNum);
        $password[] = $alphabetSet[$n];
    }
    // Implode is the most important to join the array of password.
    return implode($password);
    }

 ?>
