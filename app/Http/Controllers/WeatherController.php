<?php

namespace App\Http\Controllers;

use App\Helpers\Day;
use App\Helpers\Forecast;
use App\Models\WeatherDays;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Lewis\LaravelPwa\Weather;

class WeatherController extends Controller
{
    public function formData()
    {
        return view('getData');
    }

    public function handleData()
    {
        $ip = request()->get('ip');
        $countryName = Weather::getCountryName($ip);
        if(!WeatherDays::shouldSearch(today(), $ip)) {
            $match = ['ip' => $ip, 'date' => Carbon::today()];
            return view('displayData', [
                'days' => WeatherDays::where('ip', $ip)->get(),
                'ip' => $ip,
                'location' => $countryName,
                'weather' => WeatherDays::where($match)->first()->conditions,
            ]);
        }

        $foreCast = Weather::getWeatherForecast($countryName);
        $currentWeather = explode(',', $foreCast->currentConditions->conditions)[0];
        $weatherObject = new Forecast($ip, $currentWeather);
        $weatherModel = new \App\Models\Weather($weatherObject->toArray());
        $weatherModel->save();

        for ($i = 0; $i < 5; $i++)
        {
            $dayObject = new Day($ip, $foreCast->days[$i]);
            $dayModel = new WeatherDays($dayObject->toArray());
            $dayModel->date = $dayModel->date["date"];
            $dayModel->save();
        }

        return view('displayData', [
            'days' => WeatherDays::where('ip', $ip)->get(),
            'ip' => $ip,
            'location' => $countryName,
            'weather' => $currentWeather
        ]);
    }

    public function CLIReturn($ip)
    {
        $countryName = Weather::getCountryName($ip);
        $foreCast = Weather::getWeatherForecast($countryName);
        $currentWeather = explode(',', $foreCast->currentConditions->conditions)[0];

        return ['country' => $countryName, 'ip' => $ip, 'weather' => $currentWeather];
    }

    public function retrieveData($ip)
    {
        $data = WeatherDays::where('ip', $ip)->get();
        $dataArray = [];
        foreach ($data as $datum)
        {
            $tmp = [
                'ip' => $datum->ip,
                'date' => $datum->date,
                'preciptype' => $datum->preciptype,
                'conditions' => $datum->conditions
            ];
            $dataArray[] = $tmp;
        }
        return response()->json(['data' => $dataArray]);
    }
}
