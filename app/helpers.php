<?php

use Carbon\Carbon;

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function fdate($date, $format = 'd/m/Y', $original_format = 'Y-m-d')
{
    if ($date == null) return 'No existe';
    return date($format, strtotime($date));
    // $date = Carbon::createFromFormat($original_format, $date);
    // $locale = app()->getLocale();
    // Carbon::setlocale($locale);
    // // $format = $locale === 'es' ? $format : 'd/m/Y';
    // $translatedDateString = $date->translatedFormat($format);
    // return $translatedDateString;
}

function fnumber($original_number)
{
    return '$' . number_format($original_number, 2);
}

function drawHeader(...$titles)
{
    echo "<template slot=\"header\"><tr>";
    foreach ($titles as $title) {
        echo "<th>" . ucfirst($title) . "</th>";
    }
    echo "</tr></template>";
}

function drawTableHead(...$titles)
{
    echo "<thead><tr>";
    foreach ($titles as $title) {
        echo "<th>" . ucfirst($title) . "</th>";
    }
    echo "</tr></thead>";
}

function expire()
{
    return;
}

function daycount($day, $start, $end, $counter)
{
    if($start > $end)
    {
        return $counter;
    }
    else
    {
        return daycount($day, strtotime("next ".$day, $start), $end, $counter+1);
    }
}
