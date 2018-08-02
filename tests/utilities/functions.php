<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 8/3/2018
 * Time: 12:07 AM
 */

function create($class, $attributes = [])
{
    return factory($class)->make($attributes);
}

function make($class, $attributes = [])
{
    return factory($class)->make($attributes);
}