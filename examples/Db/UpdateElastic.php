<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 09/03/15
 * Time: 13:59
 */

class UpdateElastic extends \Chencha\Conveyor\Machine
{
    function actsOnUser(User $user)
    {
        echo "Updating Elastic Search Service with " . $user->email;
    }

}