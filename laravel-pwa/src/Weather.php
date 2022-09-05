<?php

namespace Lewis\LaravelPwa;

use Illuminate\Support\Facades\Http;

class Weather
{
    public static function getCountryName($ip)
    {
        $request = json_decode(Http::withoutVerifying()->get(sprintf('http://ip-api.com/json/%s', $ip)));
        $region = $request->regionName;
        return $region;
    }

    public static function getWeatherForecast($location)
    {
        //Key left in URL to allow the project to be functional, should extract to env for a real application
        $request = json_decode(Http::withoutVerifying()->get(sprintf('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/%s?unitGroup=metric&key=64QKF8JU8YKUVHLB9ZH6YFSZ9&contentType=json', $location)));
        return $request;
    }
}
