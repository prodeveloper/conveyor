<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 12:35
 */

namespace Chencha\Conveyor;

use Illuminate\Support\ServiceProvider;
use Chencha\Conveyor;

class ConveyorServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Conveyor::class, function () {
            return new Conveyor();
        });
    }
}