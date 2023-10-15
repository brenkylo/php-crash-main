<?php
/* ------------ Sessions ------------ */

/*
  Sessions are a way to store information (in variables) to be used across multiple pages.
  Unlike cookies, sessions are stored on the server.
*/

session_start(); // Must be called before accessing any session data

if (isset($_POST['submit'])) { //if click submit by getting value and echoing out 
  $name = filter_input(INPUT_POST,'name', 
  FILTER_SANITIZE_SPECIAL_CHARS);

  $password = $_POST['password'];

  if ($username == 'bren' && $password == 'password'){
    $_SESSION['username'] = $username;
    header('location: /PHP-CRASH/extras/dashboard.php'); //passing the string location
  }else{
    echo 'incorect Password/Username';
  }
} 
?>

<!-- Pass data through a link -->
<a href="<?php echo htmlspecialchars($_SERVER 
['PHP_SELF']); ?>?username=Bren">Link</a>

<br><br>

<!-- Pass data through a form -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div>
  <label>Name: </label>
  <input type="text" name="name">
</div>
<br>
<div>
<label>Password: </label>
  <input type="password" name="password">
</div>
<br>
  <input type="submit" name="submit" value="Submit">
</form>