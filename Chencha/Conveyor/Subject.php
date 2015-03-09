<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 27/02/15
 * Time: 13:07
 */

namespace Chencha\Conveyor;

use Illuminate\Support\MessageBag;


abstract class Subject
{
    protected $response;
    /**
     * @var MessageBag
     */
    protected $errorBag;

    function __construct()
    {
        $this->errorBag = new MessageBag();
    }

    /**
     * @return bool
     */
    function hasErrors()
    {
        return !$this->errorBag->isEmpty();
    }

    function getErrors()
    {
        return $this->errorBag;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

}