<?php include_once 'includes/header.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
  $categoryCurrent = getCategory($db, $_GET['id']);
  if(!isset($categoryCurrent['id'])) {
    header("Location: index.php");
  }
  ?>

<div class="container">
  <section>
    <h2 class="ultimas">Posts <?=$categoryCurrent['nombre'];?></h2>
    <?php
      $lastPosts = getLastPosts($db, null, $_GET['id']);
      if ($lastPosts):
        while($post = mysqli_fetch_assoc($lastPosts)):
          ?>
          <article>
            <a href="post.php?id=<?=$post['id']?>">
              <h3><?=$post['titulo'];?></h3>
              <span class="date"><?=$post['categoria'] . ' | '.$post['fecha'];?></span>
              <p><?=substr($post['descripcion'], 0, 180)."...";?></p>
            </a>
          </article>
        
        <?php endwhile; else: ?>
          <p class="alert">There is no posts in this category.</p>
        <?php endif; ?>
  </section>
  <?php require_once 'includes/aside.php'; ?>
</div>
<?php require_once 'includes/footer.php'; ?>


