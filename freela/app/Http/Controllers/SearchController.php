<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

Use App\search;

use App\User as AppUser;

use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, AppUser $user)
    {
        $this->request = $request;
        $this->repository = $user;
    }

    public function index()
    {
        $data = DB::table('users')
            ->leftJoin('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*')
            ->distinct()
            ->paginate(10);

            $unique = $data->unique('name');

            $unique->values()->all();
        
        return  view('pages.freelas', ['unique'=>$unique], ['data'=>$data]);
    }

    public function indexFreela($id)
    {
        $all = DB::table('users')
            ->Join('idioma', 'idioma.user_id', 'users.id')
            ->join('courses', 'courses.user_id', 'users.id')
            ->join('experiencia', 'experiencia.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*', 'courses.*', 'experiencia.*')
            ->where('users.id', $id)
            ->paginate(10);

       

        $user = DB::table('users')
            ->Join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*')
            ->where('users.id', $id)
            ->paginate(10);

        $unique = $user->unique();

        $unique->values()->all();

        return view('pages.freela', 
            ['unique'=>$unique],
            ['user'=>$user],
            ['all'=>$all]);
    }

    public function search(Request $request)
    {
        $filters = $request->all();

        $data = $this->repository->search($request->filter, $request->filter2, $request->filter3);

            return view('pages.search', [
                'data' => $data, 
                'filters' => $filters,
            ]);
    }
}
