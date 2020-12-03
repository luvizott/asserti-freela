<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class freelas extends Controller
{
    //
    function index()
    {   
        $data = DB::table('users')->paginate(2);
            return view('pages.freelas', ['data'=>$data]);
    }
    
}