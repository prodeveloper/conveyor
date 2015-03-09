<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 12:45
 */

namespace Chencha\Conveyor;

use Illuminate\Support\Facades\Facade;

class ConveyorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'conveyor';
    }
}