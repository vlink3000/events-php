<?php

declare(strict_types=1);

namespace EventsPhp\Domain\Event;

class OrderCompletedEvent
{
    public function display (array $message)
    {
        echo 'completed';
    }
}