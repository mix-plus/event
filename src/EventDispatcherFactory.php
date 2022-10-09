<?php


namespace MixPlus\Event;


use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\ListenerProviderInterface;

class EventDispatcherFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $listeners = $container->get(ListenerProviderInterface::class);
        $log = new Logger("event");
        return new EventDispatcher($listeners, $log);
    }
}
