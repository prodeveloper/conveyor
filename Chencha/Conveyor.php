<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 09:21
 */

namespace Chencha;


use Chencha\Conveyor\Belt;
use Chencha\Conveyor\Engine;
use Chencha\Conveyor\Exceptions\BeltDoesNotExist;
use Chencha\Conveyor\Exceptions\ProcessDoesNotExist;
use Chencha\Conveyor\Process;


class Conveyor
{

    protected $belts = [];
    protected $processes = [];


    function registerBelt(Belt $belt)
    {
        $this->belts[get_class($belt)] = $belt;
    }

    function makeBelt($beltName)
    {
        if (!isset($this->belts[$beltName])) {
            throw new BeltDoesNotExist("Undefined {$beltName}");
        }
        $this->belts[$beltName]->setEngine(new Engine());
        return $this->belts[$beltName];
    }

    function registerProcess(Process $process)
    {
        $this->processes[get_class($process)] = $process;
    }

    function makeProcess($processName)
    {
        if (!isset($this->processes[$processName])) {
            throw new ProcessDoesNotExist("Undefined {$processName}");
        }
        return $this->buildProcess($this->processes[$processName]);
    }

    function buildProcess(Process $process)
    {
        $process->setEngine(new Engine());
        return $process;
    }

}