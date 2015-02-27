<?php

namespace spec\Chencha\Conveyor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EngineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Conveyor\Engine');
    }
}
