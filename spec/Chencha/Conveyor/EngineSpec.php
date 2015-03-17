<?php

namespace spec\Chencha\Conveyor;

use Chencha\Mocks\BeltMock;
use Chencha\Mocks\MachineMock;
use Chencha\Mocks\MachineWithProcessError;
use Chencha\Mocks\ProcessMock;
use Chencha\Mocks\SampleSubject;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;
use Chencha\Conveyor\Exceptions\StopProcessException;

class EngineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Conveyor\Engine');
    }

    function it_runs_belt()
    {
        $subject = new SampleSubject();
        $prophet = new Prophet();
        $prophecy = $prophet->prophesize();
        $prophecy->willExtend(MachineMock::class);
        $prophecy->handle($subject)->shouldBeCalled();
        $dummyMachine = $prophecy->reveal();
        $belt = new BeltMock();
        $belt->registerMachines($dummyMachine);
        $this->runBelt($subject, $belt);
        $prophet->checkPredictions();
    }

    function it_runs_process()
    {
        $subject = new SampleSubject();
        $prophet = new Prophet();
        $prophecy = $prophet->prophesize();
        $prophecy->willExtend(MachineMock::class);
        $prophecy->handle($subject)->shouldBeCalled();
        $dummyMachine = $prophecy->reveal();
        $belt = new BeltMock();
        $belt->registerMachines($dummyMachine);
        $process = new ProcessMock();
        $process->registerBelts($belt);
        $this->runProcess($subject, $process);
        $prophet->checkPredictions();

    }
    function it_ignores_process_exception_in_belt(){
        $subject = new SampleSubject();
        $machine= new MachineWithProcessError();
        $belt = new BeltMock();
        $belt->registerMachines($machine);
        $this->runBelt($subject,$belt);
    }
    function it_rethrows_process_exception(){
        $subject = new SampleSubject();
        $machine= new MachineWithProcessError();
        $belt = new BeltMock();
        $belt->registerMachines($machine);
        $process = new ProcessMock();
        $process->registerBelts($belt);
        $this->shouldThrow(StopProcessException::class)->during('runProcess',[$subject,$process]);
    }
}
