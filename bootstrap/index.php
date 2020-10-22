<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;
//use Slim\Factory\AppFactory;
use DI\Container;
use DI\Bridge\Slim\Bridge as SlimAppFactory;

require __DIR__ . '/../vendor/autoload.php';
/* $user = new User;

die();
 */
$container = new Container();


//AppFactory::setContainer($container);

$settings = require __DIR__ . '/../app/settings.php';
$settings($container);

//$app = AppFactory::create();
$app = SlimAppFactory::create($container);

$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

//$app->addErrorMiddleware(true, true, true);

/* $app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
}); */

$app->run();