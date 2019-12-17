<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/redirection.php'; ?>
<main>
  <div class="container">
    <section>
      <h2>Create Post</h2>
      <p>Add new post to the blog.</p>
      <form action="save-post.php" method="post" >
        
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <?php echo isset($_SESSION['errorsPost']) ? showError($_SESSION['errorsPost'], 'title') : '';  ?>
        
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <?php echo isset($_SESSION['errorsPost']) ? showError($_SESSION['errorsPost'], 'description') : '';  ?>
  
        <label for="category">Category</label>
        <select name="category" id="category">
          <?php $categories = getCategories($db);
          if (!empty($categories)):
            while($category = mysqli_fetch_assoc($categories)):
          ?>
  
              <option value="<?=$category['id']?>"><?=$category['nombre']?></option>
          
          <?php endwhile; endif;?>
        </select>
        <?php echo isset($_SESSION['errorsPost']) ? showError($_SESSION['errorsPost'], 'category') : '';  ?>
        
        <input type="submit" value="Save">
      </form>
      <?php deleteErrors(); ?>
    </section>
    <?php include_once 'includes/aside.php'; ?>
  </div>
</main>
<?php include_once 'includes/footer.php'; ?>

