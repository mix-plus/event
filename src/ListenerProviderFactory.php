<?php


namespace MixPlus\Event;


use MixPlus\Event\Contract\ListenerInterface;

class ListenerProviderFactory
{
    public function __invoke($config = [])
    {
        $listenerProvider = new ListenerProvider();

        // Register config listeners.
        $this->registerConfig($listenerProvider, $config);

        return $listenerProvider;
    }

    private function registerConfig(ListenerProvider $provider, $config): void
    {
//        $config = $container->get(ConfigInterface::class);
//        foreach ($config->get('listeners', []) as $listener => $priority) {
        foreach ($config as $listener => $priority) {
            if (is_int($listener)) {
                $listener = $priority;
                $priority = ListenerData::DEFAULT_PRIORITY;
            }
            if (is_string($listener)) {
                $this->register($provider, $listener, $priority);
            }
        }
    }

    private function register(ListenerProvider $provider, string $listener, int $priority = ListenerData::DEFAULT_PRIORITY): void
    {
        $instance = new $listener;
        if ($instance instanceof ListenerInterface) {
            foreach ($instance->listen() as $event) {
                $provider->on($event, [$instance, 'process'], $priority);
            }
        }
    }
}
