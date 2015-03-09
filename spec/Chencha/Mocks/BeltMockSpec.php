<?php

namespace spec\Chencha\Mocks;

use Chencha\Mocks\MachineMock;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Chencha\Mocks\NotMachineMock;
use Chencha\Conveyor\Exceptions\InvalidMachineException;

class BeltMockSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Mocks\BeltMock');
    }

    function it_refuses_non_machines()
    {
        $machine = new NotMachineMock();
        $this->shouldThrow(InvalidMachineException::class)->during('registerMachines', [$machine]);

    }

    function it_registers_machine()
    {
        $machine = new MachineMock();
        $this->registerMachines($machine);
        $this->getMachines()->shouldBeLike([$machine]);
    }
}
