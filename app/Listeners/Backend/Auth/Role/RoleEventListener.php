<?php

namespace App\Listeners\Backend\Auth\Role;

use App\Events\Backend\Auth\Role\FeatureCreated;
use App\Events\Backend\Auth\Role\FeatureDeleted;
use App\Events\Backend\Auth\Role\FeatureUpdated;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        logger('Role Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        logger('Role Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        logger('Role Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            FeatureCreated::class,
            'App\Listeners\Backend\Auth\Role\RoleEventListener@onCreated'
        );

        $events->listen(
            FeatureUpdated::class,
            'App\Listeners\Backend\Auth\Role\RoleEventListener@onUpdated'
        );

        $events->listen(
            FeatureDeleted::class,
            'App\Listeners\Backend\Auth\Role\RoleEventListener@onDeleted'
        );
    }
}
