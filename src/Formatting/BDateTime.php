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

namespace Spier\Formatting;

use DateTime;
use DateTimeZone;
use Exception;

/**
 * Class BDateTime
 * @package BlueBox\Lib
 */
class BDateTime extends DateTime
{
    private const TIME_ZONE = 'Asia/Calcutta';

    /**
     * Description: timestamp
     * @return string
     * @throws Exception
     * Created by rpurant on 09/03/2021 5:02 PM
     */
    public static function timestamp(): string
    {
        $timestamp = time();
        $dt = self::now();
        $dt->setTimestamp($timestamp);
        return $dt->format('Y-m-d H:i:s');
    }

    /**
     * Description: now
     * @return DateTime
     * @throws Exception
     * Created by rpurant on 06/03/2021 3:44 AM
     */
    public static function now(): DateTime
    {
        return new DateTime("now", new DateTimeZone(self::TIME_ZONE));
    }

    /**
     * Description: get
     * @param $datetime
     * @return DateTime
     * @throws Exception
     * Created by rpurant on 06/03/2021 3:51 AM
     */
    public static function get($datetime): DateTime
    {
        return new DateTime($datetime, new DateTimeZone(self::TIME_ZONE));
    }
}
