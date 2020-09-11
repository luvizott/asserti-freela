<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

Use App\Experience;

use Illuminate\Support\Facades\DB;

class ExpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        //
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
    public function addExp(Request $request)
    {
        $experiencia = new Experience();
        $experiencia->empresa = $request->empresa;
        $experiencia->function = $request->function;
        $experiencia->time_fst = $request->time_fst;
        $experiencia->time_scd = $request->time_scd;
        $experiencia->user_id = auth()->user()->id;
        $experiencia->save();
        
        $name = auth()->user()->name;

        $update = auth()->user()->update([
            'name' => '$$$$$'
        ]);

        $update = auth()->user()->update([
            'name' => $name
        ]);

        return redirect()->route('perfil')
                    ->with('status', 'Experiência adicionada com sucesso!');
    }
    public function tecnologyList()
    {
        $data['experiencia'] = DB::table('experiencia')
                                    ->where('user_id', auth()->user()->id)
                                    ->paginate(10);


        return view('admin.dashboard', $data);
    }
    public function delete($id)
    {
        DB::table('experiencia')->where('id',$id)->delete();
            return redirect()->route('perfil');;
    }
}
