<?php


namespace App\Models\Filters\Properties;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class PropertyType implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        return $builder->where('propertyType', $value);
    }
}
