<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freela extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'image', 'provider', 'provider_id',
    ];

    public function search($filter)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })->toSql();
        //->paginate();

        dd($results);
    }
}
