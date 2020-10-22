<?php

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if (!function_exists('base_path')) {

    function base_path($path = '') {
        return __DIR__.'/../{$path}';
    }
}

if (!function_exists('database_path'))
{
    function database_path($path = '')
    {
        return base_path("database/{$path}");
    }
}

if (!function_exists('config_path'))
{
    function config_path($path = '')
    {
        return base_path("config/{$path}");
    }
}

if (!function_exists('storage_path'))
{
    function storage_path($path = '')
    {
        return base_path("storage/{$path}");
    }
}

if (!function_exists('public_path'))
{
    function public_path($path = '')
    {
        return base_path("public_path/{$path}");
    }
}


if (!function_exists('resources_path'))
{
    function resources_path($path = '')
    {
        return base_path("resources/{$path}");
    }
}

if (!function_exists('routes_path'))
{
    function routes_path($path = '')
    {
        return base_path("routes/{$path}");
    }
}

if (!function_exists('app_path'))
{
    function app_path($path = '')
    {
        return base_path("app/{$path}");
    }
}



if (!function_exists('view')) {
    function view(Response $response, $template, $with=[]) {
       /*  $cache = __DIR__.'/../cache';
        $views = __DIR__.'/../resources/views'; */

        $cache = config('blade.cache');
        $views = config('blade.views');

        $blade = (new Blade($views, $cache))->make($template, $with);

        $response->getBody()->write($blade->render());

        return $response;
    }
}