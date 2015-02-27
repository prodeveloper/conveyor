<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 15:10
 */

namespace Chencha\Mocks;

use Chencha\Conveyor\Machine;

class MachineMock extends Machine
{
    function actsOnSampleSubject($item)
    {
        return true;
    }
}