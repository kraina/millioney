<?php


namespace App\Models\Filters\Properties;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Location implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        if($value === "ALL"){
            return $builder->where("location", "!=", $value);
        }
        if(!is_array($value)) {
            $value = explode(', ', $value);
        }
        return $builder->whereIn('location', $value);
    }
}
