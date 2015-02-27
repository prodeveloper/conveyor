##Start Conveyor

    $belt= new Chencha\Conveyor\Belt();
    $belt->addSubjects($subject);
    $belt->addSynchronousMachines(Machine [] $machines1);
    $belt->addASynchronousMachines(Machine [] $machines2)
    
    $engine=new Chencha\Conveyor\Engine();
    $engine->run($belt);
    
    $belt->getResponse();
    $belt->hasError();
    $belt->getErrors();
    
    
    