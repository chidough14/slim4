<?php

namespace App\Http\Controllers;
/* use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request; */

class WelcomeController {
    public function index ($response) {
        $response->getBody()->write("Controller worked  world!");
        return $response;
    }

    public function show ( $response, $name, $id) {
        //var_dump($params);
        $response->getBody()->write("Controller worked  {$name}!id of {$id}");

        return $response;
    }
}