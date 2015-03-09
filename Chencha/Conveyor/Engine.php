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
    function run(Subject $subject, Belt $belt)
    {
        $machines = $belt->getMachines();
        $machines->each(function (Machine $machine) use ($subject, $belt) {
            $machine->handle($subject);
        });
    }

}