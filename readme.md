#Command and Request Convey System

##Basic Usage

###Bootstrap Code
    
    $userDbBelt=new UserDbBelt(); //Extends Chencha\Conveyor\Belt
    $userDbBelt->registerMachines(SaveInDatabase(), new UpdateElastic()); 
    
    $mainConveyor=new Chencha\Conveyor();
    $mainConveyor->registerBelt($userDbBelt);
###Running Belt

    $userDbBelt =$mainConveyor->makeBelt(UserDbBelt::class);
    $subject=new User("email"=>"test@test.com","password"=>"good_password");
    $$userDbBelt->run($subject);
    
    $subject->getResponse();
    $subject->hasError();
    $subject->getErrors();
    
##Processes

Processes are belts that are chained together. 
To stop a process before the next belt. A StopBeltException should be thrown.
    
    $userRegistration= new RegistrationProcess();
    $userRegistration->registerConveyors($userValidation,$userDbBelt,$userAlertBelt); //Ordering is important
    $mainConveyor->registerProcess($userRegistration);
    
###Running a process
    $userRegistrationProcess=$mainConveyor->makeBelt(RegistrationProcess::class);
    $userRegistrationProcess->run($user);
     
##Exception
    StopBeltException //This exceptions will stop the belt before next group is called
    FatalBeltException //Stop belt immediately
  
  
##Laravel Deployment

For users of laravel 5.* The package ships with a facade. To use the facade

1. Open your *config/app.php*
2. Register *Chencha\Conveyor\ConveyorServiceProvider* in your providers array 
3. Add the facade *Chencha\Conveyor* to your aliases array

##Deploy status

    This system is not ready for use heavy changes expected coming days
    
 
    
    
    