##Start Conveyor

    $belt= new Chencha\Conveyor\Belt();
    $belt->addSubject($subject);
    $belt->addSubject($subject2);
    $belt->addSynchronousMachines(Machine [] $machines);
    
    $engine=new Chencha\Conveyor\Engine();
    $engine->run($belt);
    
    $subject->getResponse();
    $subject->hasError();
    $subject->getErrors();
    
    
    