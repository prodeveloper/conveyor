<?php

namespace spec\Chencha\Mocks;

use Chencha\Mocks\NonRelatedItem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Chencha\Mocks\Item;

class MachineMockSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Chencha\Mocks\MachineMock');
    }

    function it_passes_handle()
    {
        $item = new Item();
        $this->handle($item)->shouldReturn(true);
    }
    function it_doesnt_handle_unrelated(){
        $item= new NonRelatedItem();
        $this->handle($item)->shouldReturn(null);

    }


}
