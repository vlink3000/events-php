<?php

declare(strict_types=1);

namespace EventsPhp\Domain\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self ORDER_COMPLETED()
 * @method static self ORDER_NOT_COMPLETED()
 */
class EventType extends Enum
{
    public const ORDER_COMPLETED = 'order-completed';
    public const ORDER_NOT_COMPLETED = 'order-not-completed';
}