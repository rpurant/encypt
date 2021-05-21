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

/**
 * Class Cookie
 * @package BlueBox\Lib
 */
class Cookie
{
    public const COOKIE_NAME = 'bb_hash';
    public const COOKIE_EXPIRY = 604800;

    /**
     * Description:
     * @param $name
     * @return bool
     * DateTime: 13/11/2019 7:26 PM
     * Created By: rpurant
     */
    public static function exists($name): bool
    {
        return isset($_COOKIE[$name]);
    }

    /**
     * Description:
     * @param $name
     * @return mixed
     * DateTime: 13/11/2019 7:26 PM
     * Created By: rpurant
     */
    public static function get($name)
    {
        return $_COOKIE[$name];
    }

    /**
     * Description:
     * @param $name
     * DateTime: 13/11/2019 7:27 PM
     * Created By: rpurant
     */
    public static function delete($name): void
    {
        self::set($name, '', time() - 1);
    }

    /**
     * Description:
     * @param $name
     * @param $value
     * @param $expiry
     * @return bool
     * DateTime: 13/11/2019 7:27 PM
     * Created By: rpurant
     */
    public static function set($name, $value, $expiry): bool
    {
        if (setcookie($name, $value, time() + $expiry, '/')) {
            return true;
        }
        return false;
    }
}
