<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

Use App\Idioma;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\URL;

class IdiomaController extends Controller
{
	protected $request;
    private $repository;

    public function __construct(Request $request, Idioma $idioma)
    {
        $this->request = $request;
        $this->repository = $idioma;
    }

	public function addIdioma(Request $request)
	{
		$idioma = new Idioma();
		$idioma->idioma = $request->idioma;
		$idioma->idioma_lv = $request->idioma_lv;
		$idioma->user_id = auth()->user()->id;
		$idioma->save();

		$name = auth()->user()->name;

        $update = auth()->user()->update([
            'name' => '$$$$$'
        ]);

        $update = auth()->user()->update([
            'name' => $name
        ]);

		return redirect()->route('perfil');
	}
	public function idiomaList()
	{
		$data['idioma'] = DB::table('idioma')
									->where('user_id', auth()->user()->id)
									->paginate(10);


		return view('admin.dashboard', $data);
	}

	public function delete($id)
	{
		DB::table('idioma')->where('id',$id)->delete();
			return redirect()->route('perfil');;
	}
	public function search(Request $request)
    {
        $filters = $request->all();

        $data = $this->repository->search($request->filter);

            return view('pages.freelas', [
                'data' => $data, 
                'filters' => $filters,
            ]);
    }
}
