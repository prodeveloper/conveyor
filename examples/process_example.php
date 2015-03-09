<?php
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "bootstrap.php";
echo "<hr>Starting process example</hr>";
$user=new User("test@test.com","good_password");
$userRegistrationProcess=$mainConveyor->makeProcess(RegistrationProcess::class);
$userRegistrationProcess->run($user);