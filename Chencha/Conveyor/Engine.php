<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 13:07
 */

namespace Chencha\Conveyor;

use Chencha\Conveyor\Belt;
use Chencha\Conveyor\Exceptions\StopBeltException;
use Chencha\Conveyor\Machine;
use Chencha\Conveyor\Process;
use Chencha\Conveyor\Exceptions\StopProcessException;

class Engine
{
    function runBelt(Subject $subject, Belt $belt, StopProcessException &$processException = null)
    {
        $belt->getMachines()->each(function (Machine $machine) use ($subject, &$processException) {
            try {
                $machine->handle($subject);
            } catch (StopProcessException $e) {
                //only time we continue is on a stop process exception
                $processException = $e;
            }
        });

    }

    function runProcess(Subject $subject, Process $process)
    {
        $belts = $process->getBelts();
        $belts->each(function (Belt $belt) use ($subject) {
            $e=null;
            $this->runBelt($subject, $belt, $e);
            $this->_throwExceptionIfProcessStopped($e);
        });
    }

    /**
     * Propagetes the stop process exception upwards
     * @param $e
     */
    protected function _throwExceptionIfProcessStopped($e)
    {

        if ($e instanceof \Exception) {
            throw $e;
        }
    }

}