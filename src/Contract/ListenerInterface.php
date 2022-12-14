<?php


namespace MixPlus\Event\Contract;

interface ListenerInterface
{
    /**
     * @return string[] returns the events that you want to listen
     */
    public function listen(): array;

    /**
     * Handle the Event when the event is triggered, all listeners will
     * complete before the event is returned to the EventDispatcher.
     */
    public function process(object $event);
}
