<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Auth;

class SocialController extends Controller
{
    /** Redirect **/
    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    /** Login With Facebook **/
    public function loginWithFacebook(){
        $user = Socialite::driver('facebook')->stateless()->user();
        $finduser = User::where('facebook_id',$user->id)->first();

        if($finduser){
            Auth::login($finduser);
            redirect('/');
        }else{
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email= $user->email;
            $new_user->facebook_id = $user->id;
            $new_user->password = bcrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            redirect('/');
        }
    }
}
