<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Idioma extends Model
{
    protected $table = 'idioma';

     public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('idioma', 'LIKE', "%{$filter}%");
            }
        })//->toSql();
        ->paginate();

         return $data = DB::table('users')
            ->where('idioma.idioma', $filter)
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
            ->paginate(10);
    }
}
