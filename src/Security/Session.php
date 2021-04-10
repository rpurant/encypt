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
 * Class Session
 * @package BlueBox\Lib
 */
class Session
{
    /**
     * Description:
     * @param $name
     * @param string $string
     * @return mixed|null
     * DateTime: 07/05/2019 09:23 AM
     * Created By: rpurant
     */
    public static function flash($name, $string = null)
    {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        }
        self::set($name, $string);
        return null;
    }

    /**
     * Description: Checks if the session is exists
     * @param $name
     * @return bool
     * DateTime: 07/10/2018 11:59 PM
     * Created By: rpurant
     */
    public static function exists($name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Description: Gets session values.
     * @param $name
     * @return mixed|null
     * DateTime: 07/05/2017 10:12 AM
     * Created By: rpurant
     */
    public static function get($name)
    {
        return $_SESSION[$name] ?? null;
    }

    /**
     * Description:
     * @param $name
     * DateTime: 07/05/2017 10:22 AM
     * Created By: rpurant
     */
    public static function delete($name): void
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * Description: Stores session values.
     * @param $name
     * @param $value
     * DateTime: 07/05/2017 10:10 AM
     * Created By: rpurant
     * @return mixed
     */
    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    /**
     * Description:
     * DateTime: 07/05/2017 10:59 AM
     * Created By: rpurant
     */
    public static function destroy(): void
    {
        session_destroy();
    }
}
