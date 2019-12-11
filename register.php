<?php

if (isset($_POST)) {
  
  include_once 'includes/connection.php';
  // Get form fields
  
  $firsnameRegister = isset($_POST['firstname-register']) ?  mysqli_real_escape_string($db, $_POST['firstname-register']) : false;
  $lastnameRegister = isset($_POST['lastname-register']) ? mysqli_real_escape_string($db, $_POST['lastname-register']) : false ;
  $emailRegister = isset($_POST['email-register']) ? mysqli_real_escape_string($db, $_POST['email-register']) : false;
  $passwordRegister = isset($_POST['password-register']) ? mysqli_real_escape_string($db, $_POST['password-register']) : false;
  
  // Array errors
  
  $errors = array();
  
  // Validate form fields
  
  if( !empty($firsnameRegister) && !is_numeric($firsnameRegister) && !preg_match("/[0-9]/", $firsnameRegister) ) {
    $firsnameRegisterValid = true;
  }else {
    $firsnameRegisterValid = false;
    $errors['firstnameRegister'] = "The firstname is not valid.";
  }
  
  if( !empty($lastnameRegister) && !is_numeric($lastnameRegister) && !preg_match("/[0-9]/", $lastnameRegister) ) {
    $lastnameRegisterValid = true;
  }else {
    $lastnameRegisterValid = false;
    $errors['lastnameRegister'] = "The lastname is not valid.";
  }
  
  if( !empty($emailRegister && filter_var($emailRegister, FILTER_VALIDATE_EMAIL))) {
    $emailRegisterValid = true;
  }else {
    $emailRegisterValid = false;
    $errors['emailRegister'] = "The email is not valid.";
  }
  
  if( !empty($emailRegister)) {
    $passwordRegisterValid = true;
  }else {
    $passwordRegisterValid = false;
    $errors['passwordRegister'] = "The password is empty.";
  }
  
  $saveUser = false;
  
  if (count($errors) == 0) {
    $saveUser = true;
    
    //Encrypt password
    
    $passwordSecure = password_hash($passwordRegister, PASSWORD_BCRYPT, ['cost' => 4]);
    
    //INSERT USER
    
    $sql = "INSERT INTO usuarios VALUES(null, '$firsnameRegister', '$lastnameRegister', '$emailRegister', '$passwordSecure', CURDATE())";
    
    $save = mysqli_query($db, $sql);
    
    
    
    if ($save) {
      $_SESSION['successfully'] = "Login successfully.";
    }else {
      $_SESSION['errors']['general'] = "Login unsuccessful";
      
    }
    
  }else {
    $saveUser = false;
    $_SESSION['errors'] = $errors;
    header('Location: index.php');
  }
  
}
  
  header('Location: index.php');