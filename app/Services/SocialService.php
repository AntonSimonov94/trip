<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{

    public function setUser(User $socialUser): string
    {
       $user = Model::query()->where('email', $socialUser->getEmail())->first();
       if($user){
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if($user->save) {
                Auth::loginUsingId($user->id);

                return route('account');
            }
       }else return route('register');
    throw new \Exception('We get error');
    }
}
