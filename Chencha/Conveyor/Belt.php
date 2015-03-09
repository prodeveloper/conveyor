<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 13:06
 */

namespace Chencha\Conveyor;

use Chencha\Conveyor\Machine;
use Chencha\Conveyor\Exceptions\InvalidMachineException;
use Illuminate\Support\MessageBag;

abstract class Belt
{
    /**
     * @var array
     */
    protected $machines;
    protected $response;
    /**
     * @var MessageBag
     */
    protected $errors;


    function registerMachines()
    {
        $no_args = func_num_args();
        for ($i = 0; $i < $no_args; $i++) {
            if (!is_a(func_get_arg($i), Machine::class)) {
                throw new InvalidMachineException(get_class(func_get_arg($i)) . " is not a valid machine");
            }
            $this->machines[] = func_get_arg($i);
        }
    }

    /**
     * @return array
     */
    public function getMachines()
    {
        return $this->machines;
    }

    public function boot()
    {
        $this->errors = new MessageBag();
        $this->response = null;
    }
}