<?php

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 19:29
 */
class EmailValidation extends \Chencha\Conveyor\Machine
{
    function actsOnUser(User $user)
    {
        if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            echo "Use email looks ok!";
        }
    }

}