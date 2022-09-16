<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class UniqueStringGenerator
{
    /**
	 *	Set Max tries
	 */
	private static int $max_tries = 10;

	/**
	 *	Current try number is
	 */
	private static int $try_number;

    /**
     *    Set a Unique value for given column
     *
     * @param $model
     * @param $column
     *
     * @param int $length
     *
     * @param null $value
     *
     * @return string
     */
	public static function getString($model, $column, int $length = 24, $value = null): string
    {
		$value = $value ?? Str::random($length);
    	return self::isUniqueKey($model, $column, $value, $length);
	}

    /**
     *    Check if generate value is unique
     *
     * @param $model
     * @param string $column
     * @param string $value
     * @param int $length
     * @param int $result
     *
     * @return string
     */
	private static function isUniqueKey($model, string $column, string $value, int $length, int $result = 1): string
    {
    	$result = $model::query()->where($column, $value)->count();

	    if ($result === 0){
	    	return $value;
	    }

	    if(self::exceedMaxTries()) {
	    	return '';
	    }

	    self::$try_number++;
	    return self::getString($column, $length);
	}

	/**
	 *	true if max tries exceeded
	 *
	 */
	private static function exceedMaxTries(): bool
    {
		return self::$try_number >= self::$max_tries;
	}
}

