<?php

declare(strict_types=1);

namespace EventsPhp\Application\Controller;

use EventsPhp\Domain\EventManager\EventManagerInterface;

class EventController
{
    /**
     * @var EventManagerInterface
     */
    private $eventManager;

    /**
     * EventController constructor.
     * @param EventManagerInterface $eventManager
     */
    public function __construct(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function processEvent (string $event, array $message)
    {
       return $this->eventManager->dispatch($event, $message);
    }
}