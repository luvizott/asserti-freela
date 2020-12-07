<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\User as AppUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, AppUser $user)
    {
        $this->request = $request;
        $this->repository = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->join('contact', 'contact.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*', 'contact.*' )
        
            ->paginate(10);
        return view('pages.freelas', ['data'=>$data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();

        $address = $user->address()->fisrt();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        $filters = $request->all();

        $data = $this->repository->search($request->filter);

        // if ($filters) {
        //     $data->where('idioma', 'LIKE', $filters);
        // }

            return view('pages.freelas', [
                'data' => $data, 
                'filters' => $filters,
            ]);
    }
  
}
