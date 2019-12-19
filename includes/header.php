<?php include_once 'includes/connection.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Blog</title>
</head>
<body>
<header>
  <div class="container">
    <h1>Blog de Videojugos</h1>
    <?php $categories = getCategories($db); ?>
    <nav>
      <?php
        if (!empty($categories)) :
        while($category = mysqli_fetch_assoc($categories)):
        
      ?>
          <a href="category.php?id=<?php echo $category['id'];  ?>"><?php echo $category['nombre']; ?></a>
      <?php endwhile;
        endif; ?>
      <a href="#">Sobre mí</a>
      <a href="#">Contacto</a>
    </nav>
  </div>
</header>
<main class="main">