<?php
  
  if (isset($_POST)) {
    
    include_once 'includes/connection.php';
    
    $name = isset($_POST['name']) ?  mysqli_real_escape_string($db, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($db, $_POST['lastname']) : false ;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;

    
    // Array errors
    
    $errors = array();
    
    // Validate form fields
    
    if( !empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name) ) {
      $nameValid = true;
    }else {
      $nameValid = false;
      $errors['name'] = "The firstname is not valid.";
    }
    
    if( !empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname) ) {
      $lastnameValid = true;
    }else {
      $lastnameValid = false;
      $errors['lastname'] = "The lastname is not valid.";
    }
    
    if( !empty($email && filter_var($email, FILTER_VALIDATE_EMAIL))) {
      $emailValid = true;
    }else {
      $emailValid = false;
      $errors['email'] = "The email is not valid.";
    }
    
    $saveUser = false;
    
    if (count($errors) == 0) {
      $saveUser = true;
      
      $user = $_SESSION['user'];
      
      //Email
      
      $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
      $issetEmail = mysqli_query($db, $sql);
      $issetuser = mysqli_fetch_assoc($issetEmail);
      
      if($issetuser['id'] == $user['id']  || empty($issetuser)) {
        $sql = "UPDATE usuarios SET nombre='$name', apellidos='$lastname', email='$email' WHERE id = '$user[id]'";
        $save = mysqli_query($db, $sql);
      
      
      if ($save) {
        $_SESSION['user']['nombre'] = $name;
        $_SESSION['user']['apellidos'] = $lastname;
        $_SESSION['user']['email'] = $email;
        $_SESSION['successfully'] = "Update successfully.";
      }else {
        $_SESSION['errors']['general'] = "Update unsuccessfully or the email is in use.";
      }
  
      }else {
        $_SESSION['errors']['general'] = "The email is in use.";
      }
      
    }else {
      $saveUser = false;
      $_SESSION['errors'] = $errors;
      header('Location: profile.php');
    }
    
  }
  
  header('Location: profile.php');