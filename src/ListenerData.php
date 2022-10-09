<?php


namespace MixPlus\Event;

class ListenerData
{
    public const DEFAULT_PRIORITY = 0;

    /**
     * @var callable
     */
    public $listener;
    public $event;
    public $priority;

    public function __construct(string $event, callable $listener, int $priority)
    {
        $this->priority = $priority;
        $this->event = $event;
        $this->listener = $listener;
    }
}
