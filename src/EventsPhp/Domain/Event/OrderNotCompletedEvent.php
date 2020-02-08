<?php

declare(strict_types=1);

namespace EventsPhp\Domain\Event;

class OrderNotCompletedEvent
{
    public function display (array $message)
    {
        echo 'not completed';
    }
}