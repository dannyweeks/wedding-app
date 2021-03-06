<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Weeks\AppBundle\Controller\MainController;

/**
 * Generate route string
 *
 * @param        $controllerClassName
 * @param        $methodName
 * @param string $bundleName
 *
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

$collection->add('wedding', new Route('/wedding', array(
    '_controller' => generateRoute(MainController::class, 'wedding'),
)));

$collection->add('reception', new Route('/reception', array(
    '_controller' => generateRoute(MainController::class, 'reception'),
)));

$collection->add('save_rsvp', new Route('/save-rsvp', array(
    '_controller' => generateRoute(MainController::class, 'saveRSVP'),
)));

$collection->add('meal_form', new Route('/wedding/order-your-food', array(
    '_controller' => generateRoute(MainController::class, 'mealForm'),
)));

return $collection;
