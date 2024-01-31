<?php
include("vendor/autoload.php");

$password="apple";

$has=password_hash($password,PASSWORD_DEFAULT);


if(password_verify($password,$has)){
    echo "Password correct";
}else{
    echo "Password incorrect";
}