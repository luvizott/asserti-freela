<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\DatabaseManager as dataBase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(dataBase $dataBase)
    {
        $this->db = $dataBase;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['endereco'] = DB::table('address')
                                ->where('user_id', auth()->user()->id)
                                ->paginate(10);

        return view('admin.dashboard', $data);
    }
}
