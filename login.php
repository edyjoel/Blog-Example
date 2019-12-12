<?php
// Init session and DB

  require_once 'includes/connection.php';

// Get form data
  
  if (isset($_POST)) {
    $emailLogin = trim($_POST['email-login']);
    $passwordLogin = trim($_POST['password-login']);
    // Query user DB
    
    $sql = "SELECT * FROM usuarios WHERE email = '$emailLogin'";
    $login = mysqli_query($db, $sql);
    
    
    if ($login && mysqli_num_rows($login ) == 1) {
      
      $user = mysqli_fetch_assoc($login);
  
      // Verify password
      
      $verify = password_verify($passwordLogin, $user['password']);
      
      if ($verify) {
  
        // Create  user session
        $_SESSION['user'] = $user;
        
        if (isset( $_SESSION['error-login'])){
          unset($_SESSION['error-login']);
        }
        
      }else {
        // Create error session
        $_SESSION['error-login'] = "Email or password is incorrect.";
      }
      
    }else {
      $_SESSION['error-login'] = "Email or password is incorrect.";
    }
    
  }


// Redirect index.php
  
  header('Location: index.php');
  