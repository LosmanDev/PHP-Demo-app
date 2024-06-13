<?php

$authenticator = new \Core\Authenticator;

$authenticator -> logout();
header("location: /");
exit();
