<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherService
{

    public function __construct(
        private readonly string $apikey,
        private readonly HttpClientInterface $httpClient
    ) {}

    public function getWeather()
    {
        $response = $this->httpClient->request(
            'GET',
            'https://api.openweathermap.org/data/2.5/weather?lon=1.44&lat=43.6&appid=' . $this->apikey
        );
        $data = $response->getContent();
        $data = $response->toArray();
        return $data;
    }
}
