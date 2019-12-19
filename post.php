<?php include_once 'includes/header.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
  $postCurrent = getPost($db, $_GET['id']);
  if(!isset($postCurrent['id'])) {
    header("Location: index.php");
  }
?>

<div class="container">
  <section>
    <h2 class="ultimas"><?=$postCurrent['titulo'];?></h2>
    <a href="category.php?id=<?=$postCurrent['categoria_id']?>">
      <h3><?=$postCurrent['category'];?></h3>
    </a>
    
    <h4><?=$postCurrent['fecha'];?></h4>
    <p><?=$postCurrent['descripcion'];?></p>
  </section>
  <?php require_once 'includes/aside.php'; ?>
</div>
<?php require_once 'includes/footer.php'; ?>


