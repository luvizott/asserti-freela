<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

Use App\Tecnology;

use Facade\FlareClient\View;

use Illuminate\Support\Facades\URL;

class TecnologyController extends Controller
{
     protected $request;
    private $repository;

    public function __construct(Request $request, Tecnology $tecnology)
    {
        $this->request = $request;
        $this->repository = $tecnology;
    }


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
    public function search(Request $request)
    {
        $filters = $request->all();

        $data = DB::table('users')
            ->join('idioma', 'idioma.user_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->join('tecnology', 'tecnology.user_id', 'users.id')
            ->select('users.*', 'idioma.*', 'address.*', 'tecnology.*' )
            ->paginate(2);

        return view('pages.freelas', ['data'=>$data]);

        $data = $this->repository->search($request->filter_tec);

            return view('pages.freelas', [
                'data' => $data, 
                'filters' => $filters,
            ]);
    }
}
