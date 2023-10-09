<?php

class ChuckController
{
    public function post()
    {
        header('Authorization: Bearer 0987654321');

        $curl = curl_init('https://api.chucknorris.io/jokes/random');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        return json_decode(curl_exec($curl), true);
    }
}