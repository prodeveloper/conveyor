<?php

namespace spec\Chencha\Conveyor;

use Chencha\Conveyor\Belt;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Chencha\Conveyor\Machine;
use Chencha\Mocks\SampleSubject;
use Prophecy\Prophet;
use Chencha\Mocks\MachineMock;

class EngineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Conveyor\Engine');
    }

    function it_runs_conveyor()
    {
        $item = new SampleSubject();
        $item2 = new SampleSubject();
        $prophet= new Prophet();
        $prophecy = $prophet->prophesize();
        $prophecy->willExtend(MachineMock::class);
        $prophecy->handle($item)->shouldBeCalled();
        $machine=$prophecy->reveal();
        $machine2=$prophecy->reveal();

        $belt = new Belt();
        $belt->addSubject($item);
        $belt->addSubject($item2);
        $belt->setSynchronousMachines([$machine, $machine2]);
        $this->run($belt);
        $prophet->checkPredictions();
    }

}
