<?php

declare(strict_types=1);

namespace EventsPhp\Domain\EventManager;

interface EventManagerInterface
{
    public function dispatch(string $event, array $message): ?string;
}