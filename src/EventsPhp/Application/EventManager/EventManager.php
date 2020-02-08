<?php

declare(strict_types=1);

namespace EventsPhp\Application\EventManager;

use EventsPhp\Domain\Enum\EventType;
use EventsPhp\Domain\Event\OrderCompletedEvent;
use EventsPhp\Domain\Event\OrderNotCompletedEvent;
use EventsPhp\Domain\EventManager\EventManagerInterface;

class EventManager implements EventManagerInterface
{
    /**
     * @param string $event
     * @param array $message
     * @return null|string
     */
    public function dispatch (string $event, array $message): ?string
    {
        if (EventType::search($event)) {
            $this->event('order-completed', [], function($message){
                $orderCompletedEvent = new OrderCompletedEvent();
                return $orderCompletedEvent->display($message);
            });

            $this->event('order-not-completed', [], function($message){
                $orderNotCompletedEvent = new OrderNotCompletedEvent();
                return $orderNotCompletedEvent->display($message);
            });
        }

        return $this->event($event, [$message]);
    }

    /**
     * @param string $name
     * @param array $data
     * @param callable|null $action
     * @param int $priority
     * @return null|string
     */
    private function event (string $name, array $data = [], callable $action = null, int $priority = 0): ?string {

        static $events = [];

        if($action) {
            $events[$name][] = [
                'priority' => $priority,
                'action' => $action
            ];
            return null;
        }

        if(!isset($events[$name])){
            return null;
        }

        $eventData = $events[$name];

        usort($eventData, function ($a, $b) {
            return $b['priority'] <=> $a['priority'];
        });

        foreach ($eventData as $event) {
            $event['action'](...$data);
        }

        return null;
    }
}