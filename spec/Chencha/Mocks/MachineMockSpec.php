<?php

namespace spec\Chencha\Mocks;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Chencha\Mocks\SampleSubject;
use Chencha\Mocks\NonRelatedItem;

class MachineMockSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Mocks\MachineMock');
    }
    function it_passes_handle()
    {
        $item = new SampleSubject();
        $this->handle($item)->shouldReturn(true);
    }

    function it_doesnt_handle_unrelated()
    {
        $item = new NonRelatedItem();
        $this->handle($item)->shouldReturn(null);
    }


}
