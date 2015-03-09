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
use Chencha\Conveyor\Process;
use Prophecy\Prophet;

class Engine
{
    function runBelt(Subject $subject, Belt $belt)
    {
        $machines = $belt->getMachines();
        $machines->each(function (Machine $machine) use ($subject, $belt) {
            $machine->handle($subject);
        });
    }

    function runProcess(Subject $subject, Process $process)
    {
        $belts = $process->getBelts();
        $belts->each(function (Belt $belt) use ($subject) {
            $this->runBelt($subject, $belt);
        });
    }

}