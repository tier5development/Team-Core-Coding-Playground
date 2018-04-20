<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function show()
    {
        try{

            $users = Auth::user()->get();
            return view('home',compact('users'));

        } catch (Exception $exception) {

            return view('errors.error',[
                'code' => $exception->getCode(),
                'message' => $exception->getMessage()
            ]);

        } catch (ModelNotFoundException $model_not_found) {

            return view('errors.error',[
                'code' => $model_not_found->getCode(),
                'message' => $model_not_found->getMessage()
            ]);

        }
    }

    public function edit($id)
    {
        try{
            $user = User::findOrFail($id);
            return view('auth.edit',compact('user'));
        }
        catch (Exception $exception)
        {
            return $exception;
        }
    }
    public function update(Request $request)
    {
        try{
            $user = User::findOrFail($request->id);
            // dd(0);
            $this->validate ($request,[
                     'profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'name'=>'required',
                    'email'=>'required|email|required|unique:users,id,?????',
                    'address' => 'required|string|max:255',
                    'zipcode' => 'required|integer|digits:6',
                    'phone' => 'required|integer|digits:10',
                ]);
            if($request->hasfile('profile'))
            {
                $profile = $request->file('profile');
                $profilename =time().'-'.$profile->getClientOriginalExtension();
                Image::make($profile)->save(public_path('images/testLaravel/' . $profilename));
                $user->profile = $profilename;
            }
            // $user->profile = $profilename;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->zipcode = $request->zipcode;
            $user->phone = $request->phone;
            $user->update();
            return redirect('home');
        }
        catch (Exception $exception)
        {
            return $exception;
        }
    }
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('home');

        } catch (Exception $exception)
        {
            return $exception;
        }
    }
}
