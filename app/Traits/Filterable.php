<?php

namespace App\Traits;

trait Filterable
{
    public function scopeFilter($query, $requestQuery)
    {
        if (! $requestQuery) {
            return $query;
        }

        foreach ($requestQuery as $field => $value) {
            if (($field != 'page') && array_key_exists($field, $this->filters) && $value != null) {
                switch ($this->filters[$field]) {
                    case 'single':
                        $query = $query->where($field, $value);
                        break;
                    case 'array':
                        $query = $query->whereIn($field, $value);
                        break;
                    case 'like':
                        $query = $query->where($field, 'LIKE', "%$value%");
                        break;
                    default:
                        break;
                }
            }
        }

        return $query;
    }
}
