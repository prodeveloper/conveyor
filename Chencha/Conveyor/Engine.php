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
use DI\Test\IntegrationTest\Fixtures\InheritanceTest\SubClass;

class Engine
{
    function run(Subject $subject,Belt $belt)
    {
        $machines=$belt->getMachines();
        foreach($machines as $machine){

        }
    }



    /**
     * @param Belt $belt
     */
    protected function _runSynchronous(Belt $belt)
    {
        $machines = $belt->getSynchronousMachines();
        $items = $belt->getSubjects();
        $this->_doSynchronousRun($machines, $items);
    }

}