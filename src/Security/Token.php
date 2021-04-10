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
 * Class Token
 * @package BlueBox\Lib
 */
class Token
{
    public const TOKEN_NAME = 'token_name';
    public const TOKEN_VALUE = 'token_value';

    /**
     * Description:
     * DateTime: 26/03/2019 12:45 PM
     * Created By: rpurant
     */
    public static function generate()
    {
        return Session::set(self::TOKEN_NAME, md5(uniqid('', true)));
    }

    /**
     * Description:
     * @param $token
     * @return bool
     * DateTime: 26/03/2019 12:45 PM
     * Created By: rpurant
     */
    public static function check($token): bool
    {
        if (Session::exists(self::TOKEN_NAME) && $token === Session::get(self::TOKEN_NAME)) {
            Session::delete(self::TOKEN_NAME);
            return true;
        }
        return false;
    }
}
