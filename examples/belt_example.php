<?php

require_once "bootstrap.php";
echo "<hr>Starting Belt example</hr>";
//Running belt
$userDbBelt =$mainConveyor->makeBelt(UserDbBelt::class);
$subject=new User("test@test.com","good_password");
$userDbBelt->run($subject);