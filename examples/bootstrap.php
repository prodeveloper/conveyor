<?php
//Classes loaded individually to prevent conflict with any existing classes you may have
require_once 'includes.php';


$userDbBelt= new UserDbBelt();
$userDbBelt->registerMachines(new SaveInDatabase(),new UpdateElastic());

$userValidationBelt= new UserValidationBelt();
$userValidationBelt->registerMachines(new EmailValidation());

$mainConveyor= new Chencha\Conveyor();
$mainConveyor->registerBelt($userDbBelt);

$userRegistration= new RegistrationProcess();
$userRegistration->registerBelts($userValidationBelt,$userDbBelt);
$mainConveyor->registerProcess($userRegistration);