<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Date;

class Day
{
    public string $ip;
    public \DateTime $date;
    public string $preciptype;
    public string $conditions;

    public function __construct(string $ip, object $day)
    {
        $this->ip = $ip;
        $this->date = $this->formatTime($day->datetime);
        $this->preciptype = $day->preciptype[0] ?? 'None';
        $this->conditions = $day->conditions;
    }

    private function formatTime($timeString)
    {
        $time = new \DateTime($timeString);
        $time->format('Y-m-d');
        return $time;
    }

    public function toArray()
    {
        return json_decode(json_encode($this), true);
    }
}
