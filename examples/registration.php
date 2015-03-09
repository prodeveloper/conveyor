<?php
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "bootstrap.php";
//Running belt
$userDbBelt =$mainConveyor->makeBelt(UserDbBelt::class);
$subject=new User("test@test.com","good_password");
$userDbBelt->run($subject);