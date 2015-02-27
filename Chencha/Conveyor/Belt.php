<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 13:06
 */

namespace Chencha\Conveyor;


class Belt
{
    protected $item;
    protected $synchronous_machines;
    protected $asynchronous_machines;

    /**
     * @param mixed $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @param array $synchronous_machines
     */
    public function setSynchronousMachines(array $synchronous_machines)
    {
        $this->synchronous_machines = $synchronous_machines;
    }

    /**
     * @param array $asynchronous_machines
     */
    public function setAsynchronousMachines(array $asynchronous_machines)
    {
        $this->asynchronous_machines = $asynchronous_machines;
    }


}