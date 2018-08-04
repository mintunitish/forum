<?php
/**
 * Created by PhpStorm.
 * User: Nitish Kumar
 * Date: 8/4/2018
 * Time: 11:08 PM
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{
    protected $request, $builder;

    protected $filters = [];

    /**
     * ThreadFilters constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        $this->getFilters()
             ->filter(function ($filter) {
                 return method_exists($this, $filter);
             })
             ->each(function ($filter, $value) {
                 $this->$filter($value);
             });

        return $this->builder;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getFilters()
    {
        return collect(array_filter($this->request->only($this->filters)))->flip();
    }
}