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

/**
 * Description:
 * User: rpurant
 * DateTime: 09/11/2019 6:44 PM
 * Created By: rpurant
 */

namespace Spier\Formatting;

/**
 * Class SelectOption
 * @package BlueBox\Lib
 */
class SelectOption
{
    /**
     * @var string selected string value for select option
     */
    public const SELECTED = 'selected';

    public const EMPTY_OPTION = '<option></option>';

    public const NONE_OPTION = '<option value="0">None</option>';

    public const NULL_OPTION = '';

    public const START_OPTION = '<option value="';

    public const END_OPTION = '</option>';
}
