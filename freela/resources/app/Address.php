<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Address extends Model
{
    protected $table = 'address';

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('cidade', 'LIKE', "%{$filter}%");
            }
        })//->toSql();
        ->paginate();

        return $results;
    }
}