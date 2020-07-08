<?php


namespace App\Models\Filters\Properties;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class PropertyType implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        if(!is_array($value)) {
            if($value === 'ALL'){
                return $builder->get();
            }
            $value = explode(', ', $value);
        }
        //return $builder->where('propertyType', $value);
        return $builder->whereIn('propertyType', $value);
    }
}
