<?php include_once 'includes/header.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php include_once 'includes/redirection.php'; ?>
<?php
  $postCurrent = getPost($db, $_GET['id']);
  if(!isset($postCurrent['id'])) {
    header("Location: index.php");
  }
?>
<div class="container">
  <section>
    <h2>Edit Post</h2>
    <p>Edit current post <?=$postCurrent['titulo'];?></p>
    <form action="save-post.php?editar=<?=$postCurrent['id'];?>" method="post" >
      
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="<?=$postCurrent['titulo'];?>">
      <?php echo isset($_SESSION['errorsPost']) ? showError($_SESSION['errorsPost'], 'title') : '';  ?>
      
      <label for="description">Description</label>
      <textarea name="description" id="description" cols="30" rows="10"><?=$postCurrent['descripcion'];?></textarea>
      <?php echo isset($_SESSION['errorsPost']) ? showError($_SESSION['errorsPost'], 'description') : '';  ?>
      
      <label for="category">Category</label>
      <select name="category" id="category">
        <?php $categories = getCategories($db);
          if (!empty($categories)):
            while($category = mysqli_fetch_assoc($categories)):
              ?>
              
              <option value="<?=$category['id']?>"
              <?= ($category['id'] == $postCurrent['categoria_id'] ) ? 'selected="selected"' : ''; ?>
              ><?=$category['nombre']?></option>
            
            <?php endwhile; endif;?>
      </select>
      <?php echo isset($_SESSION['errorsPost']) ? showError($_SESSION['errorsPost'], 'category') : '';  ?>
      
      <input type="submit" value="Save">
    </form>
    <?php deleteErrors(); ?>
  </section>
  <?php require_once 'includes/aside.php'; ?>
</div>
<?php require_once 'includes/footer.php'; ?>


