<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Company;
use App\CardColor;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Auth;

/**
 * CompanyController
 */
class CompanyController extends Controller
{

    /**
     * Display the create company form
     * @return Object create company view
     */
    public function create()
    {
        return view('companies.create', ['card_colors' => CardColor::all()]);
    }

    /**
     * Store the user from the POST request
     * @param Object $request post request from the company create form
     * @return Object redirection to profile page
     */
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

        Company::create([
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

    /**
     * Display the company profile page
     * @return Object company profile view
     */
    public function profile()
    {
        $user = auth()->user();
        $companyInfos = $user->company;
        $cardColor = CardColor::findOrFail($companyInfos['card_color_id'])['color'];
        return view('companies.profile', ['userInfos' => $user, 'companyInfos' => $companyInfos, 'cardColor' => $cardColor]);
    }

    /**
     * Function who validate the request, form the data, send an email to each users
     * @return back to the precedent page with a success message
     */
    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'emailContent' => 'required',
            'company' => 'required'
        ]);

        $data = array(
            'emailContent' => $request->emailContent,
            'company' => $request->company
        );

        // Get all users subscribed to mail to a company
        $users = auth()->user()->company()->get()[0]->subscribedUser()->where('is_subscribed_to_emails', 1)->get();

        foreach ($users as $user) {
            Mail::to($user['email'])->send((new SendMail($data))->build());
        }

        return back()->with('success', 'Emails sent succesfully!');
    }
}
