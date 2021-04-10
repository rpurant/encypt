<?php


namespace Spier\Security;

/**
 * Class Sanitize
 * @package Spier\Security
 */
class Sanitize
{
    /**
     * Description: escape
     * @param $string
     * @return string
     * Created by rpurant on 10/04/2021 11:28 PM
     */
    public static function escape($string): string
    {
        return htmlentities($string, ENT_QUOTES, 'UTF-8');
    }
}
