<?php

class EchoController
{
    public function post()
    {
        header('Authorization: Bearer 1234567890');

        return $_POST;
    }
}