<?php

set_time_limit(0);

include 'Config/bootstrap/bootstrap.php';


header("Content-type:text/html;charset=utf-8");


$website = new website();

$website->run();
?>
