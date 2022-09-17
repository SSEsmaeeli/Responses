<?php

namespace App\Facades;

use App\States\Post\Draft;
use App\States\Post\Pending;
use App\States\Post\Published;
use App\States\Post\Rejected;
use Illuminate\Support\Facades\Facade;

/**
 * @method static getColor()
 * @method static getNextResources()
 * @method static isPermittedByGivenStateAndRole($state, $userRole)
 */
class PostState extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return match(app()->postState) {
            Draft::TITLE => Draft::class,
            Pending::TITLE => Pending::class,
            Published::TITLE => Published::class,
            Rejected::TITLE => Rejected::class,
        };
    }
}
