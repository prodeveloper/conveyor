<?php
//Classes loaded individually to prevent conflict with any existing classes you may have
require_once "../vendor/autoload.php";

require_once "Db/SaveInDatabase.php";
require_once "Db/UpdateElastic.php";

require_once "Processes/RegistrationProcess.php";
require_once "Processes/RegistrationProcess.php";

require_once "Belts/UserDbBelt.php";
require_once "Belts/UserValidationBelt.php";

require_once "Validation/EmailValidation.php";

require_once "Subjects/User.php";


$userDbBelt= new UserDbBelt();
$userDbBelt->registerMachines(new SaveInDatabase(),new UpdateElastic());

$userValidationBelt= new UserValidationBelt();
$userValidationBelt->registerMachines(new EmailValidation());

$mainConveyor= new Chencha\Conveyor();
$mainConveyor->registerBelt($userDbBelt);

$userRegistration= new RegistrationProcess();
$userRegistration->registerBelts($userValidationBelt,$userDbBelt);
$mainConveyor->registerProcess($userRegistration);