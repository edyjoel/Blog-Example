<?php
  
  if (isset($_POST)) {
    include_once 'includes/connection.php';
    
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    
    $errors = array();
    
    if (!empty($name) && !is_numeric($name) && preg_match("/[0-9]/", $name)) {
      $nameValid = true;
    }else {
      $nameValid = false;
      $errors['name'] = "Name invalid";
    }
    
    if (count($errors == 0)) {
      $sql = "INSERT INTO categorias VALUES(NULL, '$name');";
      
      $categorySave = mysqli_query($db, $sql);
    }
  }
  
  header("Location: index.php");
 