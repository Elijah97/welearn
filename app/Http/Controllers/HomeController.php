<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

use Validator;
use Redirect;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        return view('dashboard.home', ['medicines' => $medicines]);
    }

    public function addMedicine(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'qty' => 'required|min:0',
            'desc' => 'required|min:0',
            'origin' => 'required|min:3',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect('/home')->withErrors($validator)->withInput();
        } else {
            $image = $request->file('pic');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/medicinePictures');
            $image->move($destinationPath, $name);

            $home = new Medicine;
            $home->name = $request->input('name');
            $home->qty = $request->input('qty');
            $home->description = $request->input('desc');
            $home->origin = $request->input('origin');
            $home->status = 1;
            $home->picture = $name;

            $home->save();
            return redirect('/home')->with('success', 'Drug succesfully registered');
        }
    }

    public function medPending($id)
    {
        $pend = DB::update("UPDATE medicines SET status = 0 WHERE id = '$id' ");
        if ($pend) {
            return redirect('/home')->with('success', 'Drug successfully suspended');
        } else {

            return ("asshole Pending");
        }
    }

    public function medPlay($id)
    {
        $play = DB::update("UPDATE medicines SET status = 1 WHERE id = '$id' ");
        if ($play) {
            return redirect('/home')->with('success', 'Drug successfully activated');
        } else {

            return ("asshole Playing");
        }
    }

    public function medDelete($id)
    {
        $delete = DB::delete("DELETE FROM medicines WHERE id = '$id' ");
        if ($delete) {
            return redirect('/home')->with('success', 'Drug successfully deleted');
        } else {

            return ("asshole Playing");
        }
    }

    public function medDetails($id)
    {
        $medicine = DB::table('medicines')
            ->select('medicines.*')
            ->where('id', '=', $id)
            ->get();

        $medicines = DB::table('medicines')
            ->select('medicines.*')
            ->where('id', '!=', $id)
            ->get();
        return view('dashboard.details', ['medicine' => $medicine, 'medicines' => $medicines]);
    }



    public function getAdmin()
    {
        $admins = DB::table('users')
            ->select('users.*')
            ->where('email', '!=', Auth::user()->email)
            ->where('role', '=', 99)
            ->get();
        return view('dashboard.admin', ['admins' => $admins]);
    }

    public function addAdmin(Request $request)
    {
        $rules = array(
            'name' => 'required|min:6|max:255',
            'email' => 'required|min:6|max:255|email|unique:users',
            'gender' => 'required',
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
            $user->gender = $request->input('gender');
            $user->role = 99;
            $user->save();
            return redirect('/admin')->with('success', 'Success; Admin Account created successfully.');
        }
    }

    public function getPharmacist()
    {
        $pharmacists = DB::table('users')
            ->select('users.*')
            ->where('email', '!=', Auth::user()->email)
            ->where('role', '=', 1)
            ->get();
        return view('dashboard.pharmacist', ['pharmacists' => $pharmacists]);
    }


    public function adminPending($id)
    {
        $pend = DB::update("UPDATE users SET status = 0 WHERE id = '$id' ");
        if ($pend) {
            return redirect('/admin')->with('success', 'Admin successfully suspended');
        } else {

            return ("asshole Pending");
        }
    }

    public function adminPlay($id)
    {
        $play = DB::update("UPDATE users SET status = 1 WHERE id = '$id' ");
        if ($play) {
            return redirect('/admin')->with('success', 'Admin successfully activated');
        } else {

            return ("asshole Playing");
        }
    }

    public function adminDelete($id)
    {
        $delete = DB::delete("DELETE FROM users WHERE id = '$id' ");
        if ($delete) {
            return redirect('/admin')->with('success', 'Admin successfully deleted');
        } else {

            return ("asshole Playing");
        }
    }





    public function addPharmacist(Request $request)
    {
        $rules = array(
            'name' => 'required|min:6|max:255',
            'email' => 'required|min:6|max:255|email|unique:users',
            'gender' => 'required',
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
            $user->gender = $request->input('gender');
            $user->role = 1;
            $user->save();
            return redirect('/pharmacist')->with('success', 'Success; Pharmacist Account created successfully.');
        }
    }




    public function pharPending($id)
    {
        $pend = DB::update("UPDATE users SET status = 0 WHERE id = '$id' ");
        if ($pend) {
            return redirect('/pharmacist')->with('success', 'pharmacist successfully suspended');
        } else {

            return ("asshole Pending");
        }
    }

    public function pharPlay($id)
    {
        $play = DB::update("UPDATE users SET status = 1 WHERE id = '$id' ");
        if ($play) {
            return redirect('/pharmacist')->with('success', 'pharmacist successfully activated');
        } else {

            return ("asshole Playing");
        }
    }

    public function pharDelete($id)
    {
        $delete = DB::delete("DELETE FROM users WHERE id = '$id' ");
        if ($delete) {
            return redirect('/pharmacist')->with('success', 'pharmacist successfully deleted');
        } else {

            return ("asshole Playing");
        }
    }
}
