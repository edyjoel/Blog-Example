<?php
  
  if (isset($_POST)) {
    include_once 'includes/connection.php';
    
    $title = isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $category = isset($_POST['category']) ? (int)$_POST['category'] : false;
    
    $user = $_SESSION['user']['id'];
    
    //Validate
    
    
    $errors = array();
    
    if (empty($title)) {
      $errors['title'] = "Title is empty";
    }
  
    if (empty($description)) {
      $errors['description'] = "Description is empty";
    }
  
    if (empty($category) && !is_numeric($category)) {
      $errors['category'] = "Category is empty";
    }
    
    
    if(count($errors) == 0) {
      $sql = "INSERT INTO entradas VALUES(null, '$user', '$category', '$title', '$description', CURDATE());";
      
      $save = mysqli_query($db, $sql);
      header("Location: index.php");
    }else {
      $_SESSION['errorsPost'] = $errors;
      header("Location: create-post.php");
    }
    
  }
  

 