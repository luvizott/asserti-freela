<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

Use App\Tecnology;

class TecnologyController extends Controller
{
    public function addTecnology(Request $request)
    {
        $tecnology = new Tecnology();
        $tecnology->type = $request->type;
        $tecnology->tecnology = $request->tecnology;
        $tecnology->nivel = $request->nivel;
        $tecnology->user_id = auth()->user()->id;
        $tecnology->save();

        $name = auth()->user()->name;

        $update = auth()->user()->update([
            'name' => '$$$$$'
        ]);

        $update = auth()->user()->update([
            'name' => $name
        ]);
        
        return redirect()->route('perfil');
    }

    public function tecnologyList()
    {
        $tec['tecnology'] = DB::table('tecnology')
                                    ->where('user_id', auth()->user()->id)
                                    ->paginate(10);


        return view('admin.dashboard', $tec);
    }

    public function delete($id)
    {
        DB::table('tecnology')->where('id',$id)->delete();
            return redirect()->route('perfil');;
    }
}
