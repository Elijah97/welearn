<?php

namespace App\Http\Controllers;

use App\Models\Content;
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


        $contents = DB::table('contents')
            ->select('contents.*')
            ->get();
        return view('dashboard.home', ['contents' => $contents]);
    }

    public function addContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'desc' => 'required|min:0',
            'content' => 'required|min:0',
            'link1' => 'min:3',
            'link2' => 'min:3',
        ]);
        if ($validator->fails()) {
            return redirect('/home')->withErrors($validator)->withInput();
        } else {
            $file = $request->file('file');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/contentFiles');
            $file->move($destinationPath, $name);

            $home = new Content;
            $home->name = $request->input('name');
            $home->description = $request->input('desc');
            $home->content = $request->input('content');
            $home->link1 = $request->input('link1');
            $home->link2 = $request->input('link2');
            $home->file = $name;
            $home->status = 1;

            $home->save();
            return redirect('/home')->with('success', 'Content succesfully added');
        }
    }

    public function contentPending($id)
    {
        $pend = DB::update("UPDATE contents SET status = 0 WHERE id = '$id' ");
        if ($pend) {
            return redirect('/home')->with('success', 'Content successfully suspended');
        } else {

            return ("asshole Pending");
        }
    }

    public function contentPlay($id)
    {
        $play = DB::update("UPDATE contents SET status = 1 WHERE id = '$id' ");
        if ($play) {
            return redirect('/home')->with('success', 'Content successfully activated');
        } else {

            return ("asshole Playing");
        }
    }

    public function contentDelete($id)
    {
        $delete = DB::delete("DELETE FROM content WHERE id = '$id' ");
        if ($delete) {
            return redirect('/home')->with('success', 'Content successfully deleted');
        } else {

            return ("asshole Playing");
        }
    }

    public function contentDetails($id)
    {
        $content = DB::table('contents')
            ->select('contents.*')
            ->where('id', '=', $id)
            ->get();

        $contents = DB::table('contents')
            ->select('contents.*')
            ->where('id', '!=', $id)
            ->get();
        return view('dashboard.details', ['content' => $content, 'contents' => $contents]);
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
