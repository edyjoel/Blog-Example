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
  $_SESSION['errorsPost'] = null;
  

    $_SESSION['errors']['general'] = null;
    $_SESSION['successfully'] = null;
  
  unset($_SESSION['errors']);
  unset($_SESSION['errorsPost']);
  
}

function getCategories ($db) {
  $sql = "SELECT * FROM categorias ORDER BY id ASC";
  $categories = mysqli_query($db, $sql);
  $result = array();
  if($categories && mysqli_num_rows($categories) >= 1) {
    $result = $categories;
  }
  return $result;
}

function getLastPosts ($db) {
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4";
  
  $posts = mysqli_query($db, $sql);
  
  $result = array();
  
  if ($posts && mysqli_num_rows($posts)) {
    $result = $posts;
  }
  
  return $result;
  
}