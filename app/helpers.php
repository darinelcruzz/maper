<?php

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function fdate($original_date, $format = 'Y-m-d', $original_format = 'Y-m-d H:i:s')
{
    Date::setLocale('es');
    // return date($format, strtotime($original_date)) ?? '';
    if ($original_date == null) {
        return 'No existe';
    }
    // $date = Date::createFromFormat($original_format, $original_date);
    $date = Date::parse($original_date);
    return $date->format($format);
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
