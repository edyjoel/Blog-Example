<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/redirection.php'; ?>
<main>
  <div class="container">
    <section>
      <h2>Create Category</h2>
      <p>Add new categories to the blog.</p>
      <form action="save-category.php" method="post" >
        <label for="name">Name Category</label>
        <input type="text" name="name" id="name">
        <input type="submit" value="Save">
      </form>
    </section>
    <?php include_once 'includes/aside.php'; ?>
  </div>
</main>
<?php include_once 'includes/footer.php'; ?>

