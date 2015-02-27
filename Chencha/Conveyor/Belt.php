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
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var array
     */
    protected $synchronous_machines = [];
    /**
     * @var array
     */
    protected $asynchronous_machines = [];

    /**
     * @param mixed $item
     */
    public function addSubject(Subject $item)
    {
        $this->items[] = $item;
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

    /**
     * @return array
     */
    public function getSynchronousMachines()
    {
        return $this->synchronous_machines;
    }

    /**
     * @return array
     */
    public function getAsynchronousMachines()
    {
        return $this->asynchronous_machines;
    }

    /**
     * @return array
     */
    public function getSubjects()
    {
        return $this->items;
    }


}