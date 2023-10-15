<?php
/* ------------ Sessions ------------ */

/*
  Sessions are a way to store information (in variables) to be used across multiple pages.
  Unlike cookies, sessions are stored on the server.
*/

 session_start();

if (isset($_POST['submit'])) { //if click submit by getting value and echoing out 
  $username = filter_input(INPUT_POST,'username', 
  FILTER_SANITIZE_SPECIAL_CHARS);
  $password =$_POST['password'];

  if($username=='bren' && $password == 'password'){
    $_SESSION['username'] = $username;
    header('Location: /PHPPROGRAM/IPT2/FINAL/php-crash-main/extras/dashboard.php');
  }else{
    echo 'Incorrect Login';
  }
} 
?>


<br><br>

<!-- Pass data through a form -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div>
  <label for="username">Name: </label>
  <input type="text" name="username">
</div>
<br>
<div>
<label for ="password">Password: </label>
  <input type="text" name="password">
</div>
<br>
  <input type="submit" name="submit" value="Submit">
</form>