<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Address;
use Facade\FlareClient\View;
use Illuminate\View\View as ViewView;

class AddressController extends Controller
{
    public function attAddress(Request $request)
    {
        $address = new Address();
        $address->rua = $request->rua;
        $address->number = $request->number;
        $address->complemento = $request->complemento;
        $address->bairro = $request->bairro;
        $address->cep = $request->cep;
        $address->cidade = $request->cidade;
        $address->uf = $request->uf;
        $address->user_id = auth()->user()->id;
        $address->save();

        $name = auth()->user()->name;

        $update = auth()->user()->update([
            'name' => '$$$$$'
        ]);

        $update = auth()->user()->update([
            'name' => $name
        ]);

        return redirect()->route('perfil');
    }
    public function addressList()
    {
        $data['address'] = DB::table('address')
                                    ->where('user_id', auth()->user()->id)
                                    ->paginate(10);


        return view('admin.dashboard', $data);
    }

    public function edit($id)
    {
        $existAddress = Address::find($id);

        return View('admin.dashboard', $existAddress);
    }

    public function delete($id)
    {
        DB::table('address')->where('id',$id)->delete();
            return redirect()->route('perfil');;
    }
    public function update(Request $request, $id){

        $data = $request->all();

        $address = $this->address->find($id);

        $update = auth()->user()->update($data);

        if ( $update )
            return redirect()->route('perfil');
        else
            return redirect()->route('perfil')->with(['errors' => 'Falha ao atualizar']);
    }
}
