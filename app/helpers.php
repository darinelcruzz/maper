<?php

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function fdate($date, $format = 'd/m/Y', $original_format = 'Y-m-d H:i:s')
{
    if ($date == null) return 'No existe';
    return date($format, strtotime($date));
    return Carbon\Carbon::createFromFormat($original_format, $date)->locale('es_ES')->translatedFormat($format);
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
