<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class freelas extends Controller
{
    //
    function list()
    {   
        $data = DB::table('users')->paginate(5);
            return view('pages.freelas', ['data'=>$data]);
    }
}
