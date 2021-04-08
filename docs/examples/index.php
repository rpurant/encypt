<?php

use Spier\Security\Encrypt;

require_once '../../vendor/autoload.php';

$encrypt_key = Encrypt::encode('This is encrypted key');
echo $encrypt_key . PHP_EOL;
echo Encrypt::decode($encrypt_key);
