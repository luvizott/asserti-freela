<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() === true) {
            $data['tecnology'] = DB::table('tecnology')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
            $data['experiencia'] = DB::table('experiencia')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
            $data['curso'] = DB::table('courses')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
            $data['idioma'] = DB::table('idioma')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
            $data['address'] = DB::table('address')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
            $data['contact'] = DB::table('contact')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
            return view('admin.dashboard', $data);
        }
        return redirect()->route('perfil.login');
    }

    public function atualizar()
    {
        if(Auth::check() === true) {
            return view('pages.atualizarPerfil');
        }
        return redirect()->route('perfil.login');
    }

    public function showLoginForm() {
        return view('admin.formLogin');
    }

    public function atualizarIdioma(Request $request)
    {
        $user = auth()->user();
        $user->idioma = $request->idioma;
        $user->idioma_lv = $request->idioma_lv;

        $data = $request->all();

        $update = auth()->user()->update($data);

        if ($update)
            return redirect()
                    ->route('perfil')
                    ->with('success', 'Dados atualizados com sucesso!');

        return redirect()
        ->back()
        -with('error', 'Falha ao atualizar o perfil...');
    }

    public function login(Request $request)
    {
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return  redirect()->back()->withInput()->withErrors(['O email informado não é válido']);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::attempt($credentials)) {
            return redirect()->route('perfil');
        }

        return  redirect()->back()->withInput()->withErrors(['Os dados estão incorretos']);
    }

    public function logout()
    {
        Auth::logout();
            return redirect()->route('perfil.login');
    }

    public function attAddress(Request $request)
    {
        $user = auth()->user();

        $user->rua = $request->rua;
        $user->number = $request->number;
        $user->complemento = $request->complemento;
        $user->bairro = $request->bairro;
        $user->cep = $request->cep;
        $user->cidade = $request->cidade;
        $user->uf = $request->uf;

        $data = $request->all();

        $update = auth()->user()->update($data);

        if ($update)
            return redirect()
                    ->route('perfil')
                    ->with('success', 'Dados atualizados com sucesso!');

        return redirect()
        ->back()
        -with('error', 'Falha ao atualizar o perfil...');
    }

    public function attSenha(Request $request)
    {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $update = auth()->user()->update($data);

        if ($update)
            return redirect()
                    ->route('perfil')
                    ->with('success', 'Dados atualizados com sucesso!');
    
        return redirect()
            ->back()
            -with('error', 'Falha ao atualizar o perfil...');
        
    }

    public function profileUpdate(Request $request)
    {   
        $user = auth()->user();

        $user->sexo= $request->sexo;
        $user->dispon= $request->dispon;
        $user->birth= $request->birth;
        $user->status= $request->status;
        $user->linkedin = $request->linkedin;
        $user->github = $request->github;

        $data = $request->all();

        $data['image'] = $user->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($user->image)
                $name = $user->image;
            else
                $name = $user->id.Str::kebab($user->name);

            date_default_timezone_set('America/Sao_Paulo');
            $ldate = date('dmY_His');
            $extenstion = $request->image->extension();
            $nameFile = "img" . $ldate.'.'. $extenstion;

            $data['image'] = $nameFile;
            
            $upload = $request->image->storeAs('users', $nameFile);
        }
        $update = auth()->user()->update($data);

        if ($update)
            return redirect()
                    ->route('perfil')
                    ->with('success', 'Dados atualizados com sucesso!');

        return redirect()
        ->back()
        -with('error', 'Falha ao atualizar o perfil...');
    }
}