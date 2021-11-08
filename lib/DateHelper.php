<?php

namespace DynoLib;

class DateHelper
{
    /**
     * @return string
     */
    public static function getActualWeekDay()
    {
        return date('D');
    }

    /**
     * @return int
     */
    public static function getActualHour()
    {
        return intval(date('G')) + 1;
    }
}