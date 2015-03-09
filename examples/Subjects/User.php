<?php

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 13:51
 */
class User extends \Chencha\Conveyor\Subject
{
    public $email;
    public $password;

    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

}