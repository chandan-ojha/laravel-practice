<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Auth;

class SocialController extends Controller
{
    /** Login With Facebook **/

    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(){
        $user = Socialite::driver('facebook')->stateless()->user();
        $finduser = User::where('facebook_id',$user->id)->first();

        if($finduser){
            Auth::login($finduser);
            return redirect('/home');
        }else{
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email= $user->email;
            $new_user->facebook_id = $user->id;
            $new_user->password = bcrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/home');
        }
    }

    /** Login With Google **/

    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle(){
        $user = Socialite::driver('google')->stateless()->user();
        $finduser = User::where('google_id',$user->id)->first();

        if($finduser){
            Auth::login($finduser);
            return redirect('/home');
        }else{
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email= $user->email;
            $new_user->google_id = $user->id;
            $new_user->password = bcrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/home');
        }
    }
    
}
