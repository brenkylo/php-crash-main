<?php
  /* ----------- File upload ---------- */
  if (isset($_POST['submit'])){

    $allowed_ext = array('png', 'jpg', 'jpeg', 'gif'); //Allowed file extension


    if(!empty($_FILES['uploadFile']['name'])){
    
      $file_name = $_FILES['uploadFile']['name'];
      $file_size = $_FILES['uploadFile']['size'];
      $file_tmp = $_FILES['uploadFile']['tmp_name'];
      $target_dir = "uploads/{$file_name}"; //Target directory

      //Getting file extension
      $file_ext = explode('.', $file_name);
      $file_ext = strtolower(end($file_ext));

      if (in_array($file_ext, $allowed_ext)){
        if($file_size <= 1000000){
          move_uploaded_file($file_tmp, $target_dir);
          $message ='<p style = "color:green;">File Uploaded</p>';
        }else{
          $message ='<p style = "color:red;">File is Too Large</p>';
        }
      }else{
        $message ='<p style = "color:red;">Invalid File Type</p>';
      }
    }else{
      $message ='<p style = "color:red;">Please Choose a file</p>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
</head>
<body>
  <?php echo $message ?? null; ?><!--if there is a message it will echo it-->
  <form action = "<?php echo $_SERVER['PHP_SELF']; ?>"
    method ="POST" enctype="multipart/form-data">
    Select Image to Upload:
    <br>
    <input type="file" name="uploadFile">
    <input type="submit" value = "Submit" name= "submit">

  </form>
  
</body>
</html>