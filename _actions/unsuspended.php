<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table=new UsersTable(new MySQL);
$table->unsuspended($_GET['id']);

HTTP::redirect("/admin.php");