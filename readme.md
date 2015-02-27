#Command and Request Convey System

##Basic Usage

    $machines=[new UserRegistration()]; 
    $subject=new HomePageRegistration();
    $subject2= new HybridRegistration();
    
    $belt= new Chencha\Conveyor\Belt();
    $belt->addSubject($subject);
    $belt->addSubject($subject2);
  
    $belt->addSynchronousMachines($machines);
    
    $engine=new Chencha\Conveyor\Engine();
    $engine->run($belt);
    
    $subject->getResponse();
    $subject->hasError();
    $subject->getErrors();
    
##Deploy status

    This system is not ready for use heavy changes expected coming days
    
 
    
    
    