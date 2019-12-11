<?php

function showError ($errors, $field) {
  $alert = '';
  if (isset($errors[$field]) && !empty($field)) {
    $alert = "<div class='alert alert-error'>$errors[$field]</div>";
  }
  
  return $alert;
}

function deleteErrors () {
  $_SESSION['errors'] = null;
  

    $_SESSION['errors']['general'] = null;
    $_SESSION['successfully'] = null;
 
  
  
  
  
  
  session_unset();
  
}