<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 13:07
 */

namespace Chencha\Conveyor;

use ReflectionClass;

abstract class Machine
{
    function handle($item)
    {
        $itemName = $this->getItemName($item);
        if ($this->listenerIsRegistered($itemName)) {
            return call_user_func([$this, 'actsOn' . $itemName], $item);
        }

    }

    /**
     * Figure out what the name of the class is.
     *
     * @param $event
     * @return string
     */
    protected function getItemName($event)
    {
        return (new ReflectionClass($event))->getShortName();
    }

    /**
     * Determine if the current machine has a way to register
     *
     * @param $eventName
     * @return bool
     */
    protected function listenerIsRegistered($itemClass)
    {
        $method = "actsOn{$itemClass}";

        return method_exists($this, $method);
    }
}