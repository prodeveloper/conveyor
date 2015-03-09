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
            $this->belts->put(get_class(func_get_arg($i)), func_get_arg($i));
        }

    }

    /**
     * @return Collection
     */
    public function getBelts()
    {
        return $this->belts;
    }
}