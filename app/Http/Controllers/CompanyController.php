<?php
namespace App\Http\Controllers;
use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Company;
use App\CardColor;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CompanyController extends Controller
{
  public function index()
  {
    $lastCompanies = Company::orderBy('created_at','desc')->take(3)->get();
    return view('companies.index', ['lastCompanies' => $lastCompanies]);
  }

  public function create()
  {
    return view('companies.create', ['card_colors' => CardColor::all()]);
  }

  public function store(CompanyCreateRequest $request)
  {
    $arrayResult = $request->all();
    $user = User::create([
        'name' => $arrayResult['first_name'],
        'lastname' => $arrayResult['last_name'],
        'email' => $arrayResult['email'],
        'password' => Hash::make($arrayResult['password']),
    ]);

    $user->assignRole('company');

    $company = Company::create([
      'company_name' => $arrayResult['company_name'],
      'company_description' => $arrayResult['company_description'],
      'latitude' => $arrayResult['latitude'],
      'longitude' => $arrayResult['longitude'],
      'number_fidelity_points' => $arrayResult['number_fidelity_points'],
      'message_to_user' => $arrayResult['message_to_user'],
      'card_color_id' => $arrayResult['card_color'],
      'user_id' => $user->id
    ]);
    return redirect('/profile');
  }

  public function profile()
  {
    $user = auth()->user();
    $companyInfos = $user->companyAccount;
    $cardColor = CardColor::findOrFail($companyInfos['card_color_id'])['color'];
    return view('companies.profile', ['userInfos' => $user, 'companyInfos' => $companyInfos, 'cardColor' => $cardColor]);
  }
}
