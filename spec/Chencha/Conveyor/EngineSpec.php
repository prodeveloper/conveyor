<?php

namespace spec\Chencha\Conveyor;

use Chencha\Conveyor\Belt;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Chencha\Conveyor\Machine;
use Chencha\Mocks\SampleSubject;

class EngineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Conveyor\Engine');
    }

}
