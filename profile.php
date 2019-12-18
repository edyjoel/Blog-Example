<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/redirection.php'; ?>
<main>
  <div class="container">
    <section>
      <h2>My Profile</h2>
      <p>Edit your data.</p>
  
      <!-- Show errors -->
      <?php if (isset($_SESSION['successfully'])): ?>
        <div class="alert alert-successfully"><?php echo $_SESSION['successfully']; ?></div>
      <?php elseif (isset($_SESSION['errors']['general'])): ?>
        <div class="alert alert-unsuccessfully"><?php echo $_SESSION['errors']['general']; ?></div>
      <?php endif; ?>
      
      <form action="update-user.php" method="post">
        
  
        <label for="name">Name</label>
        <input type="text" name="name" value="<?=$_SESSION['user']['nombre']?>">
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : ''; ?>
  
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="<?=$_SESSION['user']['apellidos']?>">
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'lastname') : ''; ?>
  
        <label for="email">Email</label>
        <input type="text" name="email" value="<?=$_SESSION['user']['email']?>">
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>
  
        <input type="submit" name="submit" value="Update">
        
      </form>
      <?php deleteErrors(); ?>
      
    </section>
    <?php include_once 'includes/aside.php'; ?>
  </div>
</main>
<?php include_once 'includes/footer.php'; ?>

