<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$auth=Auth::check();
$table=new UsersTable(new MySQL);
$users=$table->getAll();
$roles=$table->getRoles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand bg-primary text-white position-fixed top-0 start-0 w-100">
        <div class="container">
        <a href="#" class="navbar-brand">Admin</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="profile.php" class="nav-link font-bold text-warning"><?= $auth->name?></a></li>
            <li class="nav-item"><a href="./_actions/logout.php" class="nav-link text-danger">Logout</a></li>
        </ul>
        </div>
        
    </nav>
    <table class="table table-dark table-striped table-bordered" style="margin-top:55px;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Role</th>
            <th></th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?=$user->id?></td>
            <td><?=$user->name?></td>
            <td><?=$user->email?></td>
            <td><?=$user->phone?></td>
            <td><?=$user->password?></td>
            <td>
                <?php if($user->role_id==3) :?>
                <span class="badge bg-success">
                    <?=$user->role ?>
                </span>
                <?php elseif($user->role_id==2) :?>
                <span class="badge bg-primary">
                    <?=$user->role ?>
                </span>
                <?php else :?>
                <span class="badge ">
                    <?=$user->role ?>
                </span>
                <?php endif ?>
            </td>
            <td>
                <?php if($auth->role_id==2):?>
                    <div class="btn btn-group">
                    <a href="#" class="btn btn-small btn-outline-primary dropdown-toogle" data-bs-toggle="dropdown">Role</a>
                    <div class="dropdown-menu">
                    <?php foreach($roles as $role) :?>
                        <a href="_actions/role.php?role_id=<?= $role->id?>&id=<?=$user->id ?>" class="dropdown-item"><?=$role->name?></a>
                    <?php endforeach ?> 
                    </div>
                    <?php if($user->suspended==1):?>
                    <a href="_actions/unsuspended.php?id=<?=$user->id?>" class="btn btn-sm btn-warning">Ban</a>
                    <?php else:?>
                    <a href="_actions/suspended.php?id=<?=$user->id?>" class="btn btn-sm btn-outline-warning">Ban</a>
                    <?php endif ?>
                

                    
                </div>
                <?php elseif($auth->role_id==3):?>
                    <div class="btn btn-group">
                    <a href="#" class="btn btn-small btn-outline-primary dropdown-toogle" data-bs-toggle="dropdown">Role</a>
                    <div class="dropdown-menu">
                    <?php foreach($roles as $role) :?>
                        <a href="_actions/role.php?role_id=<?= $role->id?>&id=<?=$user->id ?>" class="dropdown-item"><?=$role->name?></a>
                    <?php endforeach ?> 
                    </div>
                    <?php if($user->suspended==1):?>
                    <a href="_actions/unsuspended.php?id=<?=$user->id?>" class="btn btn-sm btn-warning">Ban</a>
                    <?php else:?>
                    <a href="_actions/suspended.php?id=<?=$user->id?>" class="btn btn-sm btn-outline-warning">Ban</a>
                    <?php endif ?>
                
                    <a href="_actions/delete.php?id=<?=$user->id?>" class="btn btn-sm btn-outline-danger">Delete</a>
                    
                </div>
                <?php else: ?>
                
                <?php endif ?>
                
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>