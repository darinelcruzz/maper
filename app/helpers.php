<?php

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function fdate($original_date, $format)
{
    $date = Date::createFromFormat('Y-m-d H:i:s', $original_date);
    return $date->format($format);
}

function drawHeader(...$titles)
{
    echo "<template slot=\"header\"><tr>";
    foreach ($titles as $title) {
        echo "<th>" . ucfirst($title) . "</th>";
    }
    echo "</tr></template>";
}
