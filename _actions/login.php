<?php
include("../vendor/autoload.php");
use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$table=new UsersTable(new MySQL);
$user=$table->checkByNameAndEmail($email,$password);
if($user->suspended==1){
    HTTP::redirect("/index.php","suspended=true");
}
if ($user) {
session_start();
$_SESSION['user']=$user;
HTTP::redirect("/profile.php");
} else {

HTTP::redirect("/index.php","incorrect=login");
}