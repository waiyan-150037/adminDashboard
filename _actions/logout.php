<?php
include("../vendor/autoload.php");
unset($_SESSION['user']);
use Helpers\HTTP;

HTTP::redirect("/index.php");