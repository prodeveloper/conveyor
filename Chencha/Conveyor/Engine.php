<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 13:07
 */

namespace Chencha\Conveyor;

use Chencha\Conveyor\Belt;
use Chencha\Conveyor\Machine;

class Engine
{
    function run(Belt $belt)
    {
        $this->_runAsynchronous($belt);
        $this->_runSynchronous($belt);

    }

    protected function _runAsynchronous(Belt $belt)
    {

    }

    /**
     * @param Belt $belt
     */
    protected function _runSynchronous(Belt $belt)
    {
        $machines = $belt->getSynchronousMachines();
        $items = $belt->getItems();
        foreach ($machines as $machine) {
            foreach ($items as $item) {
                $machine->handle($item);
            }
        }
    }
}