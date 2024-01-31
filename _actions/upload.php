<?php

include("../vendor/autoload.php");

use Libs\Database\UsersTable;
use Libs\Database\MySQL;
use Helpers\HTTP;
use Helpers\Auth;

$user=Auth::check();

$tmp=$_FILES['photo']['tmp_name'];
$type=$_FILES['photo']['type'];
$name=$_FILES['photo']['name'];



if($type == "image/jpeg" or $type== "image/png"){
move_uploaded_file($tmp,"./photos/$name");
$user->photo=$name;
$table=new UsersTable(new MySQL);
$table->updatePhoto($user->id,$name);
HTTP::redirect("/profile.php");
}else{
    HTTP::redirect("/profile.php","type=error");
}