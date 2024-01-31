<?php

include("vendor/autoload.php");
use Helpers\Auth;
$user=Auth::check();
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./_actions/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-5">
      <?php if($user->photo):?>
        <img src="./_actions/photos/<?=$user->photo?>" alt="" style="width:300px;height=300px">
      <?php endif ?>
      <?php if(isset($_GET['type'])):?>
        <div class="alert bg-warning">PhotoType not Allow</div>
      <?php endif ?>
      <form
        action="./_actions/upload.php"
        method="POST"
        enctype="multipart/form-data"
        class="input-group my-3"
      >
        <input type="file" name="photo" class="form-control" />
        <button class="btn btn-secondary">Upload</button>
      </form>
      <h1 class="mb-3">John Doe (Manager)</h1>
      <ul class="list-group">
      <li class="list-group-item"><b>Phone:</b><?=$user->name?></li>
        <li class="list-group-item"><b>Email:</b><?=$user->email?></li>
        <li class="list-group-item"><b>Phone:</b><?=$user->phone?></li>
        <li class="list-group-item">
          <b>Address:</b><?=$user->address?>
        </li>
      </ul>
      <br />
      <a href="admin.php">Admin</a>|
      <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
  </body>
</html>
