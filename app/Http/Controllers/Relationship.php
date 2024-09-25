<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;

class Relationship extends Controller
{
    public function avatar(){
        $user = User::find(19);
        $avt = $user->avatar;
        dump([$user, $avt]);

        $avt = Avatar::find(2);
        $user = $avt->user;
        dump([$avt, $user]);
    }
}
