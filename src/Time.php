<?php

namespace xiaodi\helper;

class Time
{

    public static function fromNow($time)
    {
        $format = '';
        if (!is_numeric($time)) {
            $time = strtotime($time);
        }

        $htime = date('H:i', $time);
        $dif = abs(time() - $time);

        if ($dif < 10) {
            $format = '几秒前';
        } else if ($dif < 3600) {
            $format = floor($dif / 60) . '分钟前';
        } else if ($dif < 10800) {
            $format = floor($dif / 3600) . '小时前';
        } else if (date('Y-m-d', $time) == date('Y-m-d')) {
            $format = '今天 ' . $htime;
        } else if (date('Y-m-d', $time) == date('Y-m-d', strtotime('-1 day'))) {
            $format = '昨天 ' . $htime;
        } else if (date('Y-m-d', $time) == date('Y-m-d', strtotime('-2 day'))) {
            $format = '前天 ' . $htime;
        } else if (date('Y', $time) == date('Y')) {
            $format = date('m-d H:i', $time);
        } else {
            $format = date('Y-m-d H:i', $time);
        }

        return $format;
    }
}
