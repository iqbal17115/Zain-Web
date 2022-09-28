<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Selects;
use App\Models\Homes;
use App\Models\HomeImg;
use App\Models\Abouts;
use App\Models\Categories;
use App\Models\Contacts;
use App\Models\Services;
use App\Models\Employees;
use App\Models\Departments;
use App\Models\Products;
use App\Models\News;
use Illuminate\Support\Facades\Mail;

class CommonController extends Controller
{
    function welcome()
    {
        $contacts = Contacts::where('contact_id', 1)->first();
        $news = News::latest()->take(3)->get();
        $cat=Categories::all();
        $prd=Products::all();
        $services=Services::all();
        $abouts=Abouts::where('about_id',2)->first();
        $home_imgs=HomeImg::latest()->take(1)->first();
        $homes=Homes::where('home_id',1)->first();
        $selects= Selects::where('select_id', 1)->first();
        $emp = Employees::where('employee_designation', 'Manager')->get();
        return view('welcome')->with('selects',$selects)->with('homes',$homes)->with('home_imgs',$home_imgs)
                                ->with('abouts',$abouts)->with('services', $services)->with('emp', $emp)
                                ->with('prd', $prd)
                                ->with('cat', $cat)
                                ->with('news', $news)
                                ->with('contacts', $contacts);
    }
    function login()
    {
        return view('common.login');
    }
    function loginSubmit(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
        'email.required' => 'Email is required',
        'password.required' => 'Password is required',
        ]);

        $user = User::where('email', $req->email)->where('password',$req->password)
                         ->first();
                         
        if($user)
        {
            if($user->type=='user')
                {
                    session()->put('logged', $user->email);
                    return redirect()->route('userdash');
                                
                }
                else if($user->type=='admin')
                {
                  session()->put('logged', $user->email);
                  return redirect()->route('admindash');
                }
        }
        else 
        {
            
            $req->session()->flash('alert-danger', 'Credentials does not match!');
            return back();
            
        }
    } 
    
    function emailSubmit(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ],
        [
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'subject.required' => 'Subject is required',
        'message.required' => 'Message is required',
        ]);
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'subject' => $req->subject,
            'message' => $req->message, 
        ];
        Mail::to('hopeit282@gmail.com')->send(new ContactMail($data));
        return back();
    }
    function newsDetails(Request $req)
    {
        $cat=Categories::all();
        $prd=Products::all();
        $services=Services::all();
        $abouts=Abouts::where('about_id',2)->first();
        $home_imgs=HomeImg::latest()->take(1)->first();
        $homes=Homes::where('home_id',1)->first();
        $selects= Selects::where('select_id', 1)->first();
        $emp = Employees::where('employee_designation', 'Manager')->get();
        $contacts = Contacts::where('contact_id', 1)->first();
        $homes=Homes::where('home_id',1)->first();
        $news = News::where('news_id', '=', $req->id)
                                ->select('news_id', 'news_title', 'news_desc', 'news_img' ,'user_id')
                                ->first();
                                
        
        return view('newsDetails')
                    ->with('news', $news)->with('homes',$homes)->with('abouts',$abouts)->with('services', $services)->with('emp', $emp)
                    ->with('prd', $prd)
                    ->with('cat', $cat)
                    ->with('contacts', $contacts);
    }
    function logout(){
        session()->forget('logged');
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('login');
    }

}
