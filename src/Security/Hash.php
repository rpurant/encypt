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

use Exception;

/**
 * Class Hash
 * @package BlueBox\Lib
 */
class Hash
{
    /**
     * @param $length
     * @return string
     * DateTime: 9/15/2018 12:00 AM
     * Created By: rpurant
     * @throws Exception
     */
    public static function salt($length): string
    {
        return bin2hex(random_bytes($length));
    }

    /**
     * @return string
     * DateTime: 9/15/2018 12:05 AM
     * Created By: rpurant
     */
    public static function unique(): string
    {
        return self::make(uniqid('', false));
    }

    /**
     * @param $string
     * @param string $salt
     * @return string
     * DateTime: 9/14/2018 11:45 PM
     * Created By: rpurant
     */
    public static function make($string, $salt = ''): string
    {
        return hash('sha256', $string . $salt);
    }
}
