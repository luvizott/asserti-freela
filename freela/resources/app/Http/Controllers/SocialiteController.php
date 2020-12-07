<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

Use Laravel\Socialite\Facades\Socialite;

use App\User;

use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        
        if($users){
            Auth::login($users);
            return redirect('/perfil');
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
            Auth::login($user);
            return redirect('perfil');
        }
    }

    public function handleProviderCallback(User $user)
    {
        $user = Socialite::with('facebook')->user();

            $checkUser = User::where('email', '=', $user->email)->first();
            if($checkUser) {
                Auth::login($checkUser);
                return redirect('perfil');
            }
    }
}
