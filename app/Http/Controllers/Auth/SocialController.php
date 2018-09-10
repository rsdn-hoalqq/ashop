<?php

namespace App\Http\Controllers\Auth;

use App\Model\Social;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */


    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();

        $social=Social::where('provider_user_id',$user->id)->where('provider','google')->first();
        if ($social){
            $u=User::where('email',$user->email)->first();
            Auth::login($u);
            return redirect('/');
        }else{
            $temp=new Social;
            $temp->provider_user_id=$user->id;
            $temp->provider='google';
            $u=User::where('email',$user->email)->first();
            if (!$u){
                $u=User::create([
                    'name'=>$user->name,
                    'email'=>$user->email
                ]);
            }
            $temp->user_id=$u->id;
            $temp->save();
            Auth::login($u);
            return redirect('/');
        }
        // $user->token;
    }
}
