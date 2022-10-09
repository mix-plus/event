<?php


namespace MixPlus\Event;


use Monolog\Logger;
use Psr\Container\ContainerInterface;

class EventDispatcherFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $log = new Logger("event");
        return new EventDispatcher(new ListenerProvider, $log);
    }
}
