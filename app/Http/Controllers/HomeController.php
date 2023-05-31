<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Add;
use App\Models\Role;
use App\Models\User;
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
    public function index()
    {
        $total_users = User::where('role','!=',1)->count();
        $total_roles = Role::count();
        $total_activity = Activity::count();
        $total_adds = Add::count();
        return view('home',compact('total_users','total_roles','total_activity','total_adds'));
    }
}
