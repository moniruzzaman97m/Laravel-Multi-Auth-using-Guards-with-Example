<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function loginpage()
    {
        return view('admin.login');
    }

    public function logged(Request $request)

    {

        $input = $request->all();


        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);

     

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))

        {

            return redirect()->route('admin.home');

        }else{

            return redirect()->route('login')

                ->with('error','Email-Address And Password Are Wrong.');

        }



    }
}
