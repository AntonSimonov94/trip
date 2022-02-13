<?php

namespace App\Contracts;

use Laravel\Socialite\Contracts\User;


interface Social
{
 public function setUser(User $socialUser):string;
}
