<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    protected $table = 'tecnology';

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('tecnology', 'LIKE', "%{$filter}%");
            }
        })//->toSql();
        ->paginate();

         return $results;
    }
}
