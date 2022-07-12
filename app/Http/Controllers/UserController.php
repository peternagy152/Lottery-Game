<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use Cart;

class UserController extends Controller
{

    public function login()
    {
        if(Session::has('loginId'))
        {
            return redirect('/home');
        }
      
        return view('login');
    }
    public function authenticate(Request $request)
    {
        //dd($request->password);
        
        // get the user by email 
        $user = DB::table('users')
        ->where('email' , $request->email)
        ->first();
       // dd($user->name);
       if($user)
       {
        if($user->password == $request->password)
        {
            $request -> session() -> put('loginId' , $user -> id);
            if($user -> Role == 'USR')
            {
                return redirect('/home');
            }
            else
            {
                return redirect()-> route('AdminPage');
            }
            
        }
        return 'Incorrect Password';
       }
       else 
       {
        return 'Email Doesnt Match ';
       }
        
       

    }
    public function logout()
    {
        Session::pull('loginId');
        return redirect('/');
    }
    public function load_User()
    {
        $user = new user();
        $user -> email = 'Peter.nagy152@gmail.com';
        $user -> password = '1234';
        $user -> Fname = "Nagy";
        $user -> Lname = 'Peter';
        $user -> phone = '01227165958';
        $user -> gender = 'M';
        $user -> Role = 'ADM';
        $user ->save();

        $user = new user();
        $user -> email = 'A.nagy152@gmail.com';
        $user -> password = '123455';
        $user -> Fname = "ALo";
        $user -> Lname = 'Ahmed';
        $user -> phone = '01142286448';
        $user -> gender = 'M';
        $user ->save();
    }

    public function register(Request $req)
    {
        $mail = DB::table('users')
        ->where('email' , $req -> input('email'))
        ->first();
        if($mail)
        {
            return 'Email Already Exist';
        }
        $user = new user();
        $user -> Fname = $req -> input('Fname');
        $user -> Lname = $req -> input('Lname');
        $user -> phone = $req -> input('phone');
        $user -> gender = $req -> input('gender');
       
        $user -> email = $req -> input('email');
        $user -> password = $req -> input('password');
        $user ->save();
        
        $request -> session() -> put('loginId' , $user -> id);
        return redirect()->route('homepage');

    }

    public function AdminPage()
    {
        if(Session::has('loginId'))
        {
           
           $user = DB::table('users')
           ->where('id' , Session::get('loginId'))
           ->first();
           if($user -> Role == 'ADM')
           {
            $items = DB::table('items')
                ->get();
                $boxes = DB::table('boxes')
                ->where('active' , 1)
                ->get();
                return view('admin' , ['items' => $items , 'boxes' => $boxes]);
             
           }
           else 
           {
            return "You are Not allowed to Reach this Page";
           }

        }
        else 
        return "You Must login First";
        
    }
    public function GethomePage()
    {
        if(Session::has('loginId'))
        {
           
           $user = DB::table('users')
           ->where('id' , Session::get('loginId'))
           ->first();
           if($user -> Role == 'ADM')
           {
            $items = DB::table('items')
                ->get();
                $boxes = DB::table('boxes')
                ->where('active' , 1)
                ->get();
                //dd(Cart::getContent());
                return view('admin' , ['items' => $items , 'boxes' => $boxes]);
             
           }
           else 
           {
            $user_logged_in = DB::table('users')
            ->where('id' , Session::get('loginId'))
            ->first();

            $boxes = DB::table('boxes')
            ->where('active' , 1)
            ->where('owner' , 0)
            ->get();

            $Pre_boxes = DB::table('boxes')
            ->where('owner' , Session::get('loginId'))
            ->get();

            $Latest_winners = DB::table('winners')
            ->orderby('created_at' , 'desc')
            ->take(3)
            ->get();

            return view('home' , ['boxes' => $boxes , 'user_logged_in' => $user_logged_in , 'Pre_boxes' => $Pre_boxes , 'Latest_winners' => $Latest_winners]);
           }

        }
        else 
        return "You Must login First";
    }

    public function RegisterPage()
    {
        if(Session::has('loginId'))
        {
            return "You Already have Account !";
        }
        else 
        {
            return view('register');
        }
    }

}
