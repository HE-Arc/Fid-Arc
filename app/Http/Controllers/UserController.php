<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getFidelityCards($idUser)
    {
      $user = User::findOrFail($idUser);
      return $user->fidelityCards()->get();
    }
}
