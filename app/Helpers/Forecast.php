<?php

namespace App\Helpers;

class Forecast
{
    public string $ip;
    public string $current_conditions;

    public function __construct($ip, string $currentConditions) {
        $this->ip = $ip;
        $this->current_conditions = $currentConditions;
    }

    public function toArray()
    {
        return json_decode(json_encode($this), true);
    }
}
