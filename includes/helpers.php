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

function getLastPosts ($db, $limit = null, $category =  null, $search = null) {
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id";
  
  if (!empty($category)) {
    $sql .= " WHERE e.categoria_id = $category";
  }
  
  if (!empty($search)) {
    $sql .= " WHERE e.titulo LIKE '%$search%'";
  }
  
  $sql .= " ORDER BY e.id DESC";
  
  
  
  if ($limit) {
    $sql .= " LIMIT 4";
  }
  
  
  
  $posts = mysqli_query($db, $sql);
  
  $result = array();
  
  if ($posts && mysqli_num_rows($posts)) {
    $result = $posts;
  }
  
  return $result;
  
}
  
  function getCategory ($db, $id) {
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categories = mysqli_query($db, $sql);
    $result = array();
    if($categories && mysqli_num_rows($categories) >= 1) {
      $result = mysqli_fetch_assoc($categories);
    }
    return $result;
  }
  
  function getPost ($db, $id) {
    $sql = "SELECT e.*, c.nombre AS 'category', CONCAT(u.nombre, ' ', u.apellidos) AS 'usuario' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id INNER JOIN usuarios u ON e.usuario_id = u.id WHERE e.id = '$id'";
    $post = mysqli_query($db, $sql);
    $result = array();
    if ($post && mysqli_num_rows($post) >= 1) {
      $result = mysqli_fetch_assoc($post);
    }
    
    return $result;
  }
  
  