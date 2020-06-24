<?php


namespace App\Models\Filters\Properties;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Search implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        return $builder->where('propertyType', $value);
    }
}
