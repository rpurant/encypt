<?php

use Spier\Security\Session;
use Spier\Security\Token;

require_once '../../vendor/autoload.php';

Token::generate();
echo Token::check(Session::get(Token::TOKEN_NAME));
