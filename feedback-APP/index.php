<?php include 'include/header.php'; ?>

<?php 
  $name = $email = $body = '';//Shorthand Method
  $nameErr = $emailErr = $bodyErr = '';//Error Handling

  if (isset($_POST['submit'])){
    //validate the name
    if(empty($_POST['name'])){
      $nameErr = 'Name is Required';
    }else{
      $name = filter_input(INPUT_POST,'name', 
        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //validate the Email
    if(empty($_POST['email'])){
      $emailErr = 'Email is Required';
    }else{
      $email = filter_input(INPUT_POST,'email', 
        FILTER_SANITIZE_EMAIL);
    }

    //validate the body
    if(empty($_POST['body'])){
      $bodyErr = 'Feedback is Required';
    }else{
      $body = filter_input(INPUT_POST,'body', 
      FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

  if (empty($nameErr) && empty($emailErr) && empty($bodyErr)){
  
    //Adding a data input to a database
    $sql = "INSERT INTO feedbacks (name, email, body) VALUES ('$name', '$email', '$body')";
    if(mysqli_query($conn, $sql)){
      //Success
      header('location: feedback.php');
    }else{
      echo 'Error:' . mysqli_error($conn);
    }
  }
}
?>

    <img src="/php-crash-main/feedback-APP/img/1BY1_PICT-FINAL.png" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Bren Kylo</p>
    
    <form method="POST" action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
    );?>" class="mt-4 w-75">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>     <!--USING TERNARY(IF-ELSE)-->
          <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?>"
            id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
          <div id="validationServerFeedback" class = "invalid-feedback">
            Please provide a valid name.
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control <?php echo !$emailErr ?: 'is-invalid';?>" 
            id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Feedback</label>
          <textarea class="form-control <?php echo !$bodyErr ?: 'is-invalid'; ?>
            " id="body" name="body" placeholder="Enter your feedback"><?php echo $body; ?></textarea>
          </div>
        <div class="mb-3">
          <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
        </div>
      </form>

<?php include 'include/footer.php'; ?>