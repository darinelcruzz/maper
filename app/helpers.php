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
    if ($original_date == null) {
        return '1992';
    }
    $date = Date::createFromFormat($original_format, $original_date);
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

function expire()
{
    $services = App\Service::where('status', 'credito')->get();

    foreach ($services as $service) {
        $today = Date::now();
        $interval = $service->getDays('date_service', $today);
        if ($interval > $service->client->days ) {
            $service->update(['status' => 'vencida']);
        }
    }
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
