<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 13:06
 */

namespace Chencha\Conveyor;

use Chencha\Conveyor\Exceptions\InvalidMachineException;
use Illuminate\Support\Collection;

abstract class Belt
{
    /**
     * @var Collection
     */
    protected $machines;
    /**
     * @var Engine
     */
    protected $engine;


    function __construct()
    {
        $this->machines = new Collection();
    }


    function registerMachines()
    {
        $no_args = func_num_args();
        for ($i = 0; $i < $no_args; $i++) {
            if (!is_a(func_get_arg($i), Machine::class)) {
                throw new InvalidMachineException(get_class(func_get_arg($i)) . " is not a valid machine");
            }
            $this->machines->put(spl_object_hash(func_get_arg($i)), func_get_arg($i));
        }
    }

    /**
     * @return Collection
     */
    public function getMachines()
    {
        return $this->machines;
    }

    public function run($subject)
    {
        return $this->engine->runBelt($subject, $this);
    }

    /**
     * @Inject
     * @param Engine $engine
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

}