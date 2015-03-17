#Command and Request Convey System

##Basic Usage

###Bootstrap Code
    
    $userDbBelt=new UserDbBelt(); //Extends Chencha\Conveyor\Belt
    $userDbBelt->registerMachines(SaveInDatabase(), new UpdateElastic()); 
    
Machines extend *\Chencha\Conveyor\Machine*

    $mainConveyor=new Chencha\Conveyor();
    $mainConveyor->registerBelt($userBelt);
    
  
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
    $userRegistration->registerBelts($userValidation,$userDbBelt); //Ordering is important
    $mainConveyor->registerProcess($userRegistration);
    
###Running a process
    $userRegistrationProcess=$mainConveyor->makeProcess(RegistrationProcess::class);
    $userRegistrationProcess->run($user);
     
##Exception
    StopProcessException //This exceptions will stop the process before next belt is run
All other exceptions bubble up immediately
  

##Deploy status

    This system is not ready for production use changes expected coming days
    
##Examples

To check the examples please see

- examples/process_example.php
- examples/belt_example.php
    
 
    
    
    