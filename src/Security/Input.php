<?php
/*
 * BlueBox, A Product of Spier Infotech
 * Copyright (c) 2021.  All rights reserved.
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Spier\Security;

use Spier\Formatting\Convert;

/**
 * Class Input
 * @package BlueBox\Lib
 */
class Input
{
    /**
     * Description: Check is the POST or GET value exists or not
     * @param string $type
     * @return bool
     * DateTime: 05/10/2018 2:58 AM
     * Created By: rpurant
     */
    public static function exists($type = 'post'): ?bool
    {
        switch ($type) {
            case 'post':
                $status = !empty($_POST);
                break;

            case 'get':
                $status = !empty($_GET);
                break;

            default:
                $status = false;
                break;
        }
        return $status;
    }

    /**
     * Description: getProperty
     * @param $obj
     * @param string $prop
     * @param string $default
     * @return string
     * Created On: 30/05/2020 12:35 PM
     * Created By: rpurant
     */
    public static function getProperty($obj, string $prop, $default = ''): string
    {
        return property_exists($obj, $prop) ? $obj->{$prop} : $default;
    }

    /**
     * Description: getFloat
     * @param $item
     * @return float
     * Created by rpurant on 09/03/2021 8:14 PM
     */
    public static function getFloat($item): float
    {
        $value = self::get($item);
        return (float)Convert::decimalMySQL($value);
    }

    /**
     * Description: Returns the value from GET or POST value or null
     * @param $item
     * @return string
     * DateTime: 05/10/2018 2:56 AM
     * Created By: rpurant
     */
    public static function get($item): string
    {
        $string = '';
        if (isset($_POST[$item])) {
            $string = Sanitize::escape($_POST[$item]);
        }
        if (isset($_GET[$item])) {
            $string = Sanitize::escape($_GET[$item]);
        }
        return $string;
    }

    /**
     * Description: getInt
     * @param $item
     * @return int
     * Created by rpurant on 09/03/2021 8:20 PM
     */
    public static function getInt($item): int
    {
        return (int)self::get($item);
    }

    /**
     * Description: getDate
     * @param string $item
     * @return string
     * Created by rpurant on 17/03/2021 8:05 PM
     */
    public static function getDate(string $item): string
    {
        return Convert::toMySQLDate(self::get($item));
    }
}
