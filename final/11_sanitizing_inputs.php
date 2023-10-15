<?php
/* --- $_GET & $_POST Superglobals -- */

/*
  We can pass data through urls and forms using the $_GET and $_POST superglobals.
*/

if (isset($_POST['submit'])) { //if click submit by getting value and echoing out 
  $name = filter_input(INPUT_POST,'name', 
  FILTER_SANITIZE_SPECIAL_CHARS);

  $age = htmlspecialchars($_POST['password']);

  echo '<h3>' . $_POST['name'] . '</h3>';
  echo '<h3>' . $_POST['password'] . '</h3>';
} ?>

<!-- Pass data through a link -->
<a href="<?php echo htmlspecialchars($_SERVER 
['PHP_SELF']); ?>?username=Brad">Link</a>

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