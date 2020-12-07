<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => [function($attribute, $value, $fail) use ($data){
                
                if (!empty($data['image'])) {
                    $image = $data['image'];
                    $extenstion = $image->extension();
                    $extenstion = strtolower ( $extenstion );
                    if ( strstr ( '.jpg;.jpeg;.png', $extenstion ) ) {
                        $extenstion = $extenstion;
                    } else {
                        $fail('A imagem é inválida, selecione um arquivo compativel com .jpeg, .jpg, .png');
                    }
                }
            }]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    
        $user = auth()->user();
        if(!empty($data['image'])) {
            $image = $data['image'];
        
            $extenstion = $image->extension();
            $extenstion = strtolower ( $extenstion );
            date_default_timezone_set('America/Sao_Paulo');
            $ldate = date('dmY_His');
            $nameImg = basename(__FILE__);
            
            $name = "img" . $ldate.'.'. $extenstion;                    
            $data['image'] = $name;

            $upload = $image->storeAs('users', $name);
                // dd("bielbiviado");
                // $data['image'] = "";
                // echo '<script language="javascript">';
                // echo 'alert("Insira um formato de arquivo válido")';
                // echo '</script>';
                // //return view('register');

            
        }
        
         $usuario = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => (!empty($data['image'])) ? $data['image'] : "user.jpg",
        ]);

        return $usuario;
    }
}