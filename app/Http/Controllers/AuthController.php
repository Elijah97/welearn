<?php

namespace App\Http\Controllers;

// use App\Models\Auth;
use Illuminate\Http\Request;
use Validator;
use Jenssegers\Agent\Agent;
use Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\Activitylogs;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = DB::table('medicines')
            ->select('medicines.*')
            ->get();
        return view('index', ['medicines' => $medicines]);
    }

    public function viewLogin()
    {
        return view('login');
    }

    public function viewRegister()
    {
        return view('register');
    }

    public function adminRegister(Request $request)
    {
        $rules = array(
            'name' => 'required|min:6|max:255',
            'email' => 'required|min:6|max:255|email|unique:users',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|max:255'
        );
        $validator = $request->validate($rules);
        if (!$validator) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->status = 1;
            $user->role = 99;
            $user->save();
            return redirect('/')->with('success', 'Success; Account created successfully.');
        }
    }

    public function login(Request $request)
    {
        $agent = new Agent();
        $browser = $agent->browser();

        $rules = array(
            'email' => 'required|min:6|max:255|email',
            'password' => 'required|min:6|max:255'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {

                $activity = new Activitylogs;
                $activity->email = Auth::user()->email;
                $activity->browser = $browser;
                $activity->ipaddress = $request->ip();
                $activity->status = 'Login';
                $activity->save();

                return redirect('/home');
            } else {
                return redirect('/login')->withErrors("Account doesn't exist, not activated yet or incorrect!");
            }
        }
    }

    public function logout(Request $request)
    {

        $agent = new Agent();
        $browser = $agent->browser();

        $activity = new Activitylogs;
        $activity->email = Auth::user()->email;
        $activity->browser = $browser;
        $activity->ipaddress = $request->ip();
        $activity->status = 'Logout';
        $activity->save();

        Auth::logout();
        return redirect('/');
    }
}
