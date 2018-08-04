<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 8/3/2018
 * Time: 12:55 AM
 */

function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}

function make($class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}