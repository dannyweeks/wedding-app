<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Weeks\AppBundle\Controller\MainController;

/**
 * Generate route string
 *
 * @param $controllerClassName
 * @param $methodName
 * @param string $bundleName
 * @return string
 */
function generateRoute($controllerClassName, $methodName, $bundleName = 'WeeksAppBundle')
{
    $controller = class_basename($controllerClassName);
    $controller = str_replace('Controller', '', $controller);

    return sprintf(
        "%s:%s:%s",
        $bundleName,
        $controller,
        $methodName
    );
}

$collection = new RouteCollection();

$collection->add('home', new Route('/', array(
    '_controller' => generateRoute(MainController::class, 'index'),
)));

return $collection;
