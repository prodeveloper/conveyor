<?php

namespace spec\Chencha;

use Chencha\Mocks\BeltMock;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Chencha\Conveyor\Exceptions\BeltDoesNotExist;

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

    function it_handles_undefined_belts()
    {
        $this->shouldThrow(BeltDoesNotExist::class)->during('makeBelt', [BeltMock::class]);
    }
}
