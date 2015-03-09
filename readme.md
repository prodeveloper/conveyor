#Command and Request Convey System

##Basic Usage

###Bootstrap Code

    $validators=[new DataValidators(), new LogicalValidator() ]; //individual classes are called simultaneously
    $db=[new SaveInDatabase(), new UpdateElastic()]; 
    $alerts=[new ThankUser(), new AlertAdmin()];
    
    $belt=new RegistrationBelt(); //Extends Chencha\Conveyor\Belt
    $belt->registerMachines($validators,$db,$alerts); //Registered groups are temporal
    
    Chencha\Conveyor::registerBelt($belt);
###Running Code

    $registrationBelt=Chencha\Conveyor::make(RegistrationBelt::class);
    $subject=new User("email"=>"test@test.com","password"=>"good_password");
    $registrationBelt->run($subject);
    
    $registrationBelt->getResponse();
    $registrationBelt->hasError();
    $registrationBelt->getErrors();
    
##Exception
    StopBeltException //This exceptions will stop the belt before next group is called
    FatalBeltException //Stop belt immediately
    
    
##Deploy status

    This system is not ready for use heavy changes expected coming days
    
 
    
    
    