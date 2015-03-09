<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 09:21
 */

namespace Chencha;


use Chencha\Conveyor\Belt;

class Conveyor
{

    protected $belts;

    function registerBelt(Belt $belt)
    {
        $this->belts[get_class($belt)] = $belt;
    }

    function makeBelt($beltName)
    {
        return $this->belts[$beltName];
    }
}