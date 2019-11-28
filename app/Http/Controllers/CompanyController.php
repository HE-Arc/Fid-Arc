<?php
namespace App\Http\Controllers;
use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Company;
use App\CardColor;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
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

  public function sendMail(Request $request)
  {
    $this->validate($request, [
      'emailContent' =>  'required',
      'company' => 'required'
    ]);

    $data = array(
        'emailContent' => $request->emailContent,
        'company' => $request->company
    );

    $mail = new SendMail($data);
    $obj = $mail->build();

    // Get all users subscribed to mail to a company
    //$users = auth()->user()->companyAccount->get()[0]->subscribedUser()->get();

    //$array = array();

    /*foreach($users as $user){
      array_push($array, $user['email']);
    }*/

    //array_push($array, 'vincentmoulin47@gmail.com');

    // Send too to personnal adress to test
    Mail::to('vincentmoulin47@gmail.com')->send($obj);

    /*Mail::send('mail.company_mail', $data, function($message) use ($array, $data)
    {    
      $message->to($array)->subject('This is test e-mail');
    });*/

    return back()->with('success', 'Emails sent succesfully!');
  }
}
