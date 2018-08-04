<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 8/4/2018
 * Time: 10:53 PM
 */

namespace App\Filters;


use App\User;

class ThreadFilters extends Filters
{
    protected $filters = ['by', 'popular'];

    /**
     * Filter the threads by a given username
     *
     * @param string $username
     * @return mixed
     */
    public function by(string $username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * Filter the threads by popularity based on number of replies
     *
     * @return mixed
     */
    public function popular()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('replies_count', 'desc');
    }
}