<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 17/03/15
 * Time: 23:43
 */

namespace Chencha\Mocks;

use Chencha\Conveyor\Exceptions\StopProcessException;
use Chencha\Conveyor\Machine;

class MachineWithProcessError extends Machine
{
    function actsOnSampleSubject($item)
    {
        throw new StopProcessException("Test Process");
    }
}