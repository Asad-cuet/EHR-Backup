<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use Auth;

// use Xenon\LaravelBDSms\Facades\SMS;
// use Xenon\LaravelBDSms\Provider\Ssl;
use LaravelBDSms, SMS;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function profile()
    {
        if(Auth::user()->role_as=='administration' || Auth::user()->role_as=='lab_tecknician')
        {
            return view('pages.profile.other_profile');
        }
        if(Auth::user()->role_as=='doctor')
        {
            return view('pages.profile.doctor_profile');
        }

    }


    public function update_profile(Request $request)
    {
        if(Auth::user()->role_as=='administration' || Auth::user()->role_as=='lab_tecknician')
        {
            if(empty($request->input('name')) || empty($request->input('email')))
            {
                return redirect()->back()->with('danger','Any field can not be empty');
            }
            if(User::where('id','!=',Auth::user()->id)->where('email',$request->input('email'))->exists())
            {
                return back()->with('danger',"The Email Existed In Other Account");
            }
            $data=[
                'name'=>$request->input('name'),
                'email'=>$request->input('email')
            ];
            User::where('id',Auth::user()->id)->update($data);
            return back()->with('status',"Profile Updated");
        }


        if(Auth::user()->role_as=='doctor')
        {
            if(empty($request->input('name')) || empty($request->input('email')) || empty($request->input('qualification')))
            {
                return redirect()->back()->with('danger','Any field can not be empty');
            }
            if(User::where('id','!=',Auth::user()->id)->where('email',$request->input('email'))->exists())
            {
                return back()->with('danger',"The Email Existed In Other Account");
            }
            $data=[
                'name'=>$request->input('name'),
                'email'=>$request->input('email')
            ];
            User::where('id',Auth::user()->id)->update($data);

            $data=[
                'qualification'=>$request->input('qualification'),
                'phone'=>$request->input('phone'),                
                'specialization'=>$request->input('specialization')                
            ];
            Doctor::where('id',Auth::user()->doctor->id)->update($data);
            return back()->with('status',"Profile Updated");
        }

    }

    public function test()
    {
        //dd('dsd');
        $response =SMS::shoot("01781856861",'test sms');
        return $response;
    }
}
