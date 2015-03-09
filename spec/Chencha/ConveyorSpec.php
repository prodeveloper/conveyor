<?php

namespace spec\Chencha;

use Chencha\Mocks\BeltMock;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConveyorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Conveyor');
    }

    function it_registers_belts()
    {
        $belt = new BeltMock();
        $this->registerBelt($belt);
        $this->makeBelt(BeltMock::class)->shouldBe($belt);
    }
}
