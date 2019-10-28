<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyUser;

class CompanyUserController extends Controller
{
    public function addFidelityCardPoint($idUser, $idCompany, $isSubscribedToEmails = null)
    {
      CompanyUser::addFidelityCardPoint($idUser, $idCompany, $isSubscribedToEmails);
    }
}
