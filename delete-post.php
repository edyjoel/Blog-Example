<?php

  require_once 'includes/connection.php';
  session_start();

if (isset($_SESSION['user']) && isset($_GET['id'])) {
  $postId = $_GET['id'];
  $userId = $_SESSION['user']['id'];
  $sql = "DELETE FROM entradas WHERE usuario_id = $userId AND id = $postId";
  mysqli_query($db, $sql);
}

header("Location: index.php");