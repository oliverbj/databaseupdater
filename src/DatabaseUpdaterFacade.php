<?php

namespace Oliverbj\DatabaseUpdater;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Oliverbj\DatabaseUpdater\Skeleton\SkeletonClass
 */
class DatabaseUpdaterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'databaseupdater';
    }
}
