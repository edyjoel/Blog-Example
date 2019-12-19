<?php include_once 'includes/header.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<div class="container">
  <section>
    <h2 class="ultimas">All posts</h2>
    <?php
      $lastPosts = getLastPosts($db);
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
        
        <?php endwhile; endif; ?>
  </section>
  <?php require_once 'includes/aside.php'; ?>
</div>
<?php require_once 'includes/footer.php'; ?>


