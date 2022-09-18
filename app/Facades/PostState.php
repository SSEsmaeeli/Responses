<?php

namespace App\Facades;

use App\States\Post\Draft;
use App\States\Post\Published;
use App\States\Post\Rejected;
use App\States\Post\Review;
use Illuminate\Support\Facades\Facade;

/**
 * @method static getColor()
 * @method static getNextResources()
 * @method static isPermittedByGivenStateAndRole($state, $userRole)
 * @method static getTitle()
 */
class PostState extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return match (app()->postState) {
            Draft::TITLE => Draft::class,
            Review::TITLE => Review::class,
            Published::TITLE => Published::class,
            Rejected::TITLE => Rejected::class,
            default => Respond::failed('Something went wrong! given state is not valid')
        };
    }
}
