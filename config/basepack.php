<?php

use Alangiacomin\LaravelBasePack\Core\Enums\BindingType;
use Alangiacomin\LaravelBasePack\Services\IBusMonitorService;
use App\Services\BusMonitorService;

return [

    /**
     * Namespaces
     */
    'namespaces' => [
        'commands' => 'App\Commands',
        'commandHandlers' => 'App\CommandHandlers',
        'controllers' => 'App\Http\Controllers',
        'events' => 'App\Events',
        'eventHandlers' => 'App\EventHandlers',
        'models' => 'App\Models',
        'repositories' => 'App\Repositories',
        'services' => 'App\Services',
    ],

    /**
     * Event listener configuration
     */
    'eventListener' => [
        // Overrides the default value
        'shouldDiscoverEvents' => true,
        // Additional directories
        'directories' => [
            'EventHandlers',
        ],
    ],

    /**
     * Binding configuration
     * List bindings for automatic injection
     */
    'bindings' => [
        'defaultType' => BindingType::Bind,
        'list' => [
            [
                'interface' => IBusMonitorService::class,
                'class' => BusMonitorService::class,
                'bindingType' => BindingType::Singleton,
            ],
        ],
    ],
];
