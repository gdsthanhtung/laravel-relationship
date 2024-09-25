<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;

class Relationship extends Controller
{
    public function avatar(){
        $user = User::find(1);
        $avt = $user->avatar;
        dump([$user, $avt]);
    }


}
