<?php

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 13:54
 */
class SaveInDatabase extends \Chencha\Conveyor\Machine
{
    function actsOnUser(User $user)
    {
        echo "Saving user " . $user->email;
    }
}