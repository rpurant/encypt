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
 * Created by IntelliJ IDEA.
 * User: rpurant
 * Date: 05/10/2018
 * Time: 12:42 AM
 */

namespace Spier\Formatting;

use BlueBox\Lib\Enum\TimeBefore;
use Exception;
use function array_key_exists;

/**
 * Class Convert
 * @package BlueBox\Lib\Convert
 */
class Convert
{
    /**
     * @param $dateString
     *
     * DateTime: 8/15/2018 6:05 PM
     * Created By: rpurant
     * @return string
     */
    public static function toMySQLDate($dateString): string
    {
        return $dateString === ''
            ? ''
            : date('Y-m-d', strtotime(str_replace('/', '-', $dateString)));
    }

    /**
     * Description:
     * @param string $dateString
     * @param int $days
     * @return false|string
     * User: rpurant
     * DateTime: 09/04/2019 12:03 AM
     */
    public static function addDaysToDate(string $dateString, int $days = 0)
    {
        return date('Y-m-d', strtotime($dateString . ' + ' . $days . ' days'));
    }

    /**
     * Description:
     * @param string $dateString
     * @param int $months
     * @return false|string
     * DateTime: 19/03/2020 11:18 PM
     * Created By: rpurant
     */
    public static function addMonthsToDate(string $dateString, int $months = 0)
    {
        return date('Y-m-d', strtotime('+' . $months . ' months', strtotime($dateString)));
    }

    /**
     * @param $dateString
     * @return false|null|string
     * DateTime: 8/15/2018 9:56 PM
     * Created By: rpurant
     */
    public static function toDate($dateString)
    {
        return $dateString === '' ? null : date('d/m/Y', strtotime($dateString));
    }

    /**
     * @param $string
     * @return string
     * DateTime: 8/15/2018 9:58 PM
     * Created By: rpurant
     */
    public static function toDecimal($string): string
    {
        return number_format((float)$string === null ? '0' : $string, 2);
    }

    /**
     * @param $string
     * @return string
     * DateTime: 9/14/2018 5:22 PM
     * Created By: rpurant
     */
    public static function toNumber($string): string
    {
        return number_format((float)$string === null ? '0' : $string);
    }

    /**
     * @param $string
     * @return string
     * DateTime: 9/5/2018 1:50 AM
     * Created By: rpurant
     */
    public static function toUppercase($string): string
    {
        return strtoupper($string);
    }

    /**
     * @param $string
     * @return string
     * DateTime: 9/5/2018 1:54 AM
     * Created By: rpurant
     */
    public static function toUCWords($string): string
    {
        return ucwords($string);
    }

    /**
     * Description:
     * @param $input
     * @return int|string
     * DateTime: 16/02/2019 9:35 PM
     * Created By: rpurant
     */
    public static function toIntegerStyle($input)
    {
        $k = 10 ** 3;
        $lakh = 10 ** 5;
        $carore = 10 ** 7;

        if ($input >= $carore) {
            $number = self::decimal((float)($input / $carore)) . ' Cr';
        } elseif ($input >= $lakh) {
            $number = self::decimal((float)($input / $lakh)) . ' Lac';
        } elseif ($input >= $k) {
            $number = (int)($input / $k) . ' K';
        } else {
            $number = (int)$input;
        }
        return $number;
    }

    /**
     * Description:
     * @param $string
     * @return string
     * DateTime: 28/03/2019 12:29 PM
     * Created By: rpurant
     */
    public static function decimal($string): string
    {
        $string = round($string, 2);
        return number_format((float)$string === null ? '0' : $string, 2);
    }

    /**
     * Description:
     * @param $string
     * @return string
     * DateTime: 27/03/2019 11:01 PM
     * Created By: rpurant
     */
    public static function decimalMySQL($string): string
    {
        return number_format((float)str_replace(',', '', $string ?? '0'), 2, '.', '');
    }

    /**
     * Description:
     * @param $string
     * @return string
     * DateTime: 31/03/2019 4:59 PM
     * Created By: rpurant
     */
    public static function toAmount($string): string
    {
        return number_format((float)$string === null ? '0' : $string);
    }

    /**
     * Description:
     * @param $dateString
     * @return false|string|null
     * DateTime: 31/03/2019 5:03 PM
     * Created By: rpurant
     */
    public static function toMySQLDateTime($dateString)
    {
        return $dateString === '' ? null : date('Y-m-d h:m:s', strtotime(str_replace('/', '-', $dateString)));
    }

    /**
     * Description:
     * @param $dateString
     * @return false|string|null
     * User: rpurant
     * DateTime: 04/07/2019 1:55 AM
     */
    public static function eventToMySQLDateTime($dateString)
    {
        return $dateString === '' ? null : date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $dateString)));
    }

    /**
     * Description:
     * @param $string
     * @return string
     * User: rpurant
     * DateTime: 12/04/2019 12:36 AM
     */
    public static function integerAmount($string): string
    {
        return number_format((float)$string === null ? '0' : $string);
    }

    /**
     * Description:
     * @param $string
     * @return string
     * User: rpurant
     * DateTime: 13/04/2019 1:13 AM
     */
    public static function percentage($string): string
    {
        return number_format((float)$string === null ? '0' : $string, 2, '.', '') . '&nbsp;%';
    }

    /**
     * @param $no
     * @return string
     * DateTime: 06/04/2018 10:36 PM
     * Created By: rpurant
     */
    public static function numberToWords($no): string
    {
        $no = (int)$no;
        $words = [
            0 => '',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen',
            20 => 'Twenty',
            30 => 'Thirty',
            40 => 'Forty',
            50 => 'Fifty',
            60 => 'Sixty',
            70 => 'Seventy',
            80 => 'Eighty',
            90 => 'Ninety',
            100 => 'Hundred',
            1000 => 'Thousand',
            100000 => 'Lakh',
            10000000 => 'Crore'];
        if ($no === 0) {
            $string = ' ';
        } else {
            $no_value = '';
            $high_no = $no;
            $remain_no = 0;
            $value = 100;
            $value1 = 1000;
            while ($no >= 100) {
                if (($value <= $no) && ($no < $value1)) {
                    $no_value = $words[$value];
                    $high_no = (int)($no / $value);
                    $remain_no = $no % $value;
                    break;
                }
                $value = $value1;
                $value1 = $value * 100;
            }
            if (array_key_exists($high_no, $words)) {
                return "$words[$high_no] $no_value " . self::numberToWords($remain_no);
            }

            $unit = $high_no % 10;
            $ten = (int)($high_no / 10) * 10;
            $string = "$words[$ten] $words[$unit] $no_value " . self::numberToWords($remain_no);
        }
        return $string;
    }

    /**
     * Description:
     * @param $dateString
     * @return false|string|null
     * DateTime: 07/09/2019 12:25 AM
     * Created By: rpurant
     */
    public static function toBirthDate($dateString)
    {
        return $dateString === '' ? null : date('d-M', strtotime($dateString));
    }

    /**
     * Description:
     * @param $time
     * @return mixed|string
     * DateTime: 26/09/2019 10:27 PM
     * Created By: rpurant
     * @throws Exception
     */
    public static function timeAgo($time): string
    {
        $timestamp = strtotime($time);
        $time = BDateTime::get($time);
        // current time
        $date = BDateTime::now();

        // difference between the current and the provided dates
        $diff = $date->getTimestamp() - $time->getTimestamp();

        // it happened now
        if ($diff < 60) {
            $string = TimeBefore::TIME_BEFORE_NOW;
        } elseif ($diff < 3600) {
            $string = str_replace('{num}', $out = round($diff / 60),
                $out === 1 ? TimeBefore::TIME_BEFORE_MINUTE : TimeBefore::TIME_BEFORE_MINUTES);
        } elseif ($diff < 86400) {
            $string = str_replace('{num}', $out = round($diff / 3600),
                $out === 1 ? TimeBefore::TIME_BEFORE_HOUR : TimeBefore::TIME_BEFORE_HOURS);
        } elseif ($diff < 172800) {
            $string = TimeBefore::TIME_BEFORE_YESTERDAY;
        } else {
            $string = strftime(date('Y', $timestamp) === date('Y') ? TimeBefore::TIME_BEFORE_FORMAT : TimeBefore::TIME_BEFORE_FORMAT_YEAR, $timestamp);
        }
        return $string;
    }

    /**
     * Description: jsonStringToObject
     * @param string $json_string
     * @return mixed
     * @throws \JsonException
     */
    public static function jsonStringToObject(string $json_string)
    {
        $import_data = htmlspecialchars_decode($json_string);
        // Convert JSON string to Object
        return json_decode($import_data, false, 512, JSON_THROW_ON_ERROR);
    }
}
