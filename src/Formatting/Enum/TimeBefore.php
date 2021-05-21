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

namespace BlueBox\Lib\Enum;

/**
 * Class TimeBefore
 * @package BlueBox\Lib\Enum
 */
abstract class TimeBefore
{
    public const TIME_BEFORE_NOW = 'just now';
    public const TIME_BEFORE_MINUTE = '{num} minute ago';
    public const TIME_BEFORE_MINUTES = '{num} minutes ago';
    public const TIME_BEFORE_HOUR = '{num} hour ago';
    public const TIME_BEFORE_HOURS = '{num} hours ago';
    public const TIME_BEFORE_YESTERDAY = 'yesterday';
    public const TIME_BEFORE_FORMAT = 'on %e %b';
    public const TIME_BEFORE_FORMAT_YEAR = 'on %e %b, %Y';
}
