<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        // $role = auth()->user()->roles->where('name', 'admin')->count();
        
        // if($role == 1){
        //     return view('admin.home');
        // }
        
        // return view('user.home');

        if ($request->user()->hasRole('user')) {
            return view('user.home');
        }

        if ($request->user()->hasRole('admin')) {
            return view('admin.home');
        }
        
    }
}
