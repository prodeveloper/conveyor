<?php
require_once "../vendor/autoload.php";
require_once "Db/SaveInDatabase.php";
require_once "Processes/RegistrationProcess.php";
require_once "Db/UpdateElastic.php";
require_once "Subjects/User.php";
require_once "Belts/UserDbBelt.php";

$userBelt= new UserDbBelt();
$userBelt->registerMachines(new SaveInDatabase(),new UpdateElastic());

$mainConveyor= new Chencha\Conveyor();
$mainConveyor->registerBelt($userBelt);