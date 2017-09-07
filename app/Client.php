<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Client extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone',
    	'email', 'contact', 'rfc', 'city'
    ];

    function getShortNameAttribute()
    {
        if (strlen($this->name) > 20) {
            return substr($this->name, 0, 20) . "...";
        }

        return $this->name;
    }

    /*function getDaysAttribute()
    {
        $today = Date::now();
        $entry = new Date(strtotime($this->date_out));
        $interval = $entry->diff($today);
        $interval = $interval->format('%a');
        return $this->date_out;
    }*/

}
