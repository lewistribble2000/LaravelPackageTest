<?php
namespace Lewis\LaravelPwa\Commands;

use App\Http\Controllers\WeatherController;
use Illuminate\Console\Command;

class SearchCommand extends Command
{
    protected $signature = 'weather:search';
    protected $description = 'Check weather based on your IP';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $weatherController = new WeatherController();
        $ip = $this->ask('Input IP address');
        $data = $weatherController->CLIReturn($ip);
        echo "Weather: " . $data['weather'] . "\nIP: " . $data['ip'] . "\nCountry: " . $data['country'];
    }
}
