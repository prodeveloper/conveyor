<?php

namespace spec\Chencha\Conveyor;

use Chencha\Mocks\BeltMock;
use Chencha\Mocks\MachineMock;
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
        $subject=new SampleSubject();
        $prophet= new Prophet();
        $prophecy = $prophet->prophesize();
        $prophecy->willExtend(MachineMock::class);
        $prophecy->handle($subject)->shouldBeCalled();
        $dummyMachine=$prophecy->reveal();
        //$dummyMachine->handle()->shouldBeCalled();
        $belt = new BeltMock();
        $belt->registerMachines($dummyMachine);
        $this->run($subject, $belt);



    }
}
