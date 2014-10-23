<?php

set_time_limit(0);

include 'Config/bootstrap/bootstrap.php';

$website = new website();

$website->run();
session_start();
$_SESSION["userId"];
$_SESSION['userName'];
?>
