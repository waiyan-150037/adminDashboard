<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
      .wrap {
        width: 100%;
        max-width: 400px;
        margin: 40px auto;
      }
    </style>
  </head>
  <body class="text-center">
    <div class="wrap">
      <h1 class="h3 mb-3">Login</h1>
      <?php if ( isset($_GET['incorrect']) ) : ?>
      <div class="alert alert-warning">Incorrect Email or Password</div>
      <?php endif ?>
      <?php if ( isset($_GET['register']) ) : ?>
      <div class="alert alert-success">Account Registration Successful</div>
      <?php endif ?>
      <?php if(isset($_GET['error'])):?>
        <div class="alert alert-warning">Incorrect File Type</div>
      <?php endif ?>
      <?php if(isset($_GET['suspended'])):?>
        <div class="alert alert-danger suspended">Account is banned</div>
        <script>
        setTimeout(() => {
          document.querySelector('.suspended').style.display="none";
        }, 2000);
        </script>
        
      <?php endif ?>
      <form action="./_actions/upload.php" method="POST" enctype="multipart/form-data" class="input-group my-3">
        <input type="file" name="photo" class="form-control">
        <button class="btn btn-secondary">Upload</button>
      </form>
      <form action="_actions/login.php" method="post">
        <input
          type="email"
          name="email"
          class="form-control mb-2"
          placeholder="Email"
          required
        />
        <input
          type="password"
          name="password"
          class="form-control mb-2"
          placeholder="Password"
          required
        />
        <button type="submit" class="w-100 btn btn-lg btn-primary">
          Login
        </button>
      </form>
      <br /><a href="register.php">Register</a>
    </div>
  </body>
</html>
