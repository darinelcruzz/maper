<?php

namespace App\Traits;
use Jenssegers\Date\Date;

trait DatesTrait
{
    function getDays($start, $end)
    {
        $start = $this->$start ? $this->$start : $start;

        $entry = new Date(strtotime($start));
        if (is_string($end)) {
            $end = new Date(strtotime($this->$end));
        }

        $interval = $entry->diff($end);
        $interval = $interval->format('%a');

        if($end->format('His') < $entry->format('His')) {
            $penalty = $interval + 2;
        } else {
            $penalty = $interval + 1;
        }
        return $penalty;
    }
}
