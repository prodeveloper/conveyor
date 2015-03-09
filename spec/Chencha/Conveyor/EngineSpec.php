<?php

namespace spec\Chencha\Conveyor;

use Chencha\Mocks\BeltMock;
use Chencha\Mocks\MachineMock;
use Chencha\Mocks\ProcessMock;
use Chencha\Mocks\SampleSubject;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

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
}
