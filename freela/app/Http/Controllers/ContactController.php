<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\contact;

Use App\User;

use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function attContato(Request $request)
    {
        $contact = new Contact();

        $contact->cell = $request->cell;
        $contact->type = $request->type;
        $contact->user_id = auth()->user()->id;
        $contact->save();

        $name = auth()->user()->name;

        $update = auth()->user()->update([
            'name' => '$$$$$'
        ]);

        $update = auth()->user()->update([
            'name' => $name
        ]);
        
        return redirect()->route('perfil');
    }
    function contactList()
    {   
        $data['contact'] = DB::table('contact')
                                ->where('user_id', auth()->user()->id)
                                ->paginate(10);

        return view('admin.dashboard', $data);
    }
    public function delete($id)
    {
        DB::table('contact')->where('id',$id)->delete();
            return redirect()->route('perfil');;
    }
}
