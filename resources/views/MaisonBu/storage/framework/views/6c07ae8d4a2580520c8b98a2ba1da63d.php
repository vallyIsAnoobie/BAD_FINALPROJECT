<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="LOGIN-PAGE">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="cover-backgrounds">
            <img class="vector" src="img/vector.svg" /> <img class="img" src="img/vector-3.svg" />
          </div>
          <img class="line" src="img/line.svg" />
          <img class="rectangle" src="img/rectangle-6412.svg" />
          <div class="group">
            <div class="div">
              <div class="text-wrapper">Email</div>
              <!-- Add an input field for email -->
              <input type="email" name="email" required placeholder="Enter your email" class="rectangle-2" />
            </div>
            <div class="group-2">
              <div class="text-wrapper">Password</div>
              <!-- Add an input field for password -->
              <input type="password" name="password" required placeholder="Enter your password" class="rectangle-3" />
            </div>
          </div>
          <p class="welcome-back-your">
            <span class="span">Welcome back!</span>
            <span class="text-wrapper-2"> <br /></span>
            <span class="text-wrapper-3">Your favorite treats are waiting</span>
          </p>
          <div class="overlap-group-wrapper">
            <div class="overlap-group">
              <div class="text-wrapper-4">Maison Burro</div>
              <div class="text-wrapper-5">バターケーキ</div>
            </div>
          </div>
          <div class="div-wrapper">
            <div class="overlap-2">
              <div class="text-wrapper-6">Login</div>
            </div>
          </div>

          <!-- Add the form tag for login -->
          <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" required>
            </div>

            <!-- Add a login button -->
            <div class="form-group">
              <button type="submit">Login</button>
            </div>
          </form>
          <p>Don't have an account? <a href="<?php echo e(route('register')); ?>">Sign up</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\MaisonBu\resources\views/login.blade.php ENDPATH**/ ?>