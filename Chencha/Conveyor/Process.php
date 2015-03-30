<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 12:58
 */

namespace Chencha\Conveyor;

use Chencha\Conveyor\Belt;
use Chencha\Conveyor\Exceptions\InvalidBeltException;
use Illuminate\Support\Collection;

abstract class Process
{
    /**
     * @var Collection
     */
    protected $belts;
    /**
     * @var Engine
     */
    protected $engine;

    function __construct()
    {
        $this->belts = new Collection();
    }

    function registerBelts()
    {
        $no_args = func_num_args();
        for ($i = 0; $i < $no_args; $i++) {
            if (!is_a(func_get_arg($i), Belt::class)) {
                throw new InvalidBeltException(get_class(func_get_arg($i)) . " is not a valid belt");
            }
            $this->belts->put(spl_object_hash(func_get_arg($i)), func_get_arg($i));
        }

    }

    public function run($subject)
    {
        $this->engine->runProcess($subject, $this);
    }

    /**
     * @return Collection
     */
    public function getBelts()
    {
        return $this->belts;
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