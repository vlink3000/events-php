<?php

declare(strict_types=1);

$autoload = require 'vendor/autoload.php';
$autoload->add('EventsPhp\\', __DIR__ . '/src/');

$eventManager = new EventsPhp\Application\EventManager\EventManager();
$controller = new EventsPhp\Application\Controller\EventController($eventManager);

$controller->processEvent('order-completed', []);
