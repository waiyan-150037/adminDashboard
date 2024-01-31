<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$table=new UsersTable(new MySQL);
$data=[
    "name"=>$_POST['name'],
    "email"=>$_POST['email'],
    "phone"=>$_POST['phone'],
    "address"=>$_POST['address'],
    "password"=>password_hash($_POST['password'],PASSWORD_DEFAULT),
];
$table->insert($data);

HTTP::redirect("/index.php","register=success");