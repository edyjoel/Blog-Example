<aside>
  
  <section class="login">
    <?php if (isset($_SESSION['user'])): ?>
      <div class="login login-successfully">
        <h2>Welcome <?php echo $_SESSION['user']['nombre'] ?> </h2>
        <!--Buttons-->
        <div class="buttons">
          <a href="create-post.php" class="btn btn-primary">Create Post</a>
          <a href="create-category.php" class="btn btn-secondary">Create Category</a>
          <a href="profile.php" class="btn btn-forth">Edit Profile</a>
          <a href="logout.php" class="btn btn-third">Logout</a>
        </div>
      </div>
    <?php endif; ?>
  
  
    <?php if (!isset($_SESSION['user'])): ?>
    <div>
      <h2>Login</h2>
      <?php if (isset($_SESSION['error-login'])): ?>
        <div class="alert alert-error">
          <div><?php echo $_SESSION['error-login']; ?></div>
        </div>
      <?php endif; ?>
      <form method="post" action="login.php">
        <label for="email-login">Email</label>
        <input id="email-login" type="email" name="email-login">
        <label for="password-login">Password</label>
        <input id="password-login" type="password" name="password-login">
        <input type="submit" value="Send">
      </form>
    </div>
    <?php endif; ?>
  </section>
  
  <?php if (!isset($_SESSION['user'])): ?>
  <section class="register">
    <h2>Register</h2>
    <!-- Show errors -->
    <?php if (isset($_SESSION['successfully'])): ?>
      <div class="alert alert-successfully"><?php echo $_SESSION['successfully']; ?></div>
    <?php elseif (isset($_SESSION['errors']['general'])): ?>
      <div class="alert alert-unsuccessfully"><?php echo $_SESSION['errors']['general']; ?></div>
    <?php endif; ?>
    <form method="post" action="/blog/register.php">
      <label for="firstname-register">Firstname</label>
      <input id="firstname-register" type="text" name="firstname-register">
      
      <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'firstnameRegister') : '';  ?>

      <label for="lastname-register">Lastname</label>
      <input id="lastname-register" type="text" name="lastname-register">
  
      <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'lastnameRegister') : '';  ?>
      
      <label for="email-register">Email</label>
      <input id="email-register" type="email" name="email-register">
  
      <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'emailRegister') : '';  ?>
      
      <label for="password-register">Password</label>
      <input id="password-register" type="password" name="password-register">
  
      <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'passwordRegister') : '';  ?>
      
      <input type="submit" value="Send" name="submit-register">
    </form>
    <?php deleteErrors(); ?>
  </section>
  <?php endif; ?>
</aside>