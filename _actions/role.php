<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table=new UsersTable(new MySQL);
$table->changeRole($_GET['id'],$_GET['role_id']);

HTTP::redirect("/admin.php");