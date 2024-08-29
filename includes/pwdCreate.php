<?php

//$securityCode = "10$88oJ/3gXA5Lrobs";  // This can be any string you want
//$securityCode = "DomiSante54%";
$securityCode = "MamouniSante43%";
$hashedSecurityCode = password_hash($securityCode, PASSWORD_DEFAULT);
echo $hashedSecurityCode;  // Save this hashed value in a safe place, or directly in your signup code.
