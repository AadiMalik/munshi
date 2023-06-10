<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',Auth()->user()->id)->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('name','ASC')->get();
        $company = Company::orderBy('name','ASC')->get();
        return view('users.create',compact('roles','company'));
    }
    public function store(Request $request)
    {
        $i=1;
        if($i=1){
            $obj=[
                "user_ip"=>$request->user_ip,
                "role"=>$request->role,
                "phone"=>$request->phone,
                "company_id"=>$request->company_id,
                "marka"=>$request->marka,
                "unit_name"=>$request->unit_name,
                "user_code"=>$request->user_code,
                "password"=>Hash::make($request->password)
            ];
            $user = User::create($obj);
        }
        if(isset($request->worker_code)){
        foreach($request->worker_code as $index=>$item){
            $obj=[
                "user_ip"=>$request->worker_ip[$index],
                "role"=>$request->worker_role[$index],
                "phone"=>$request->worker_phone[$index],
                "user_code"=>$request->worker_code[$index],
                "password"=>Hash::make($request->worker_password[$index]),
                "company_id"=>$request->worker_company[$index],
                "marka"=>$request->worker_marka[$index],
                "unit_name"=>$request->worker_name[$index],
                "designation"=>$request->worker_designation[$index],
            ];
            $user = User::create($obj);
        }
    }
        return redirect('users')->with('success', 'User Created!');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('name','ASC')->get();
        $company = Company::orderBy('name','ASC')->get();
        return view('users.edit', compact('user','roles','company'));
    }
    public function update(Request $request, $id)
    {
        $old_user = User::find($id);
        $obj = $request->all();
        if($request->password !=null){
            $obj['password'] = Hash::make($request->password);
        }
        unset($obj['_token']);
        unset($obj['_method']);
        $user = User::where('id', $id)->update($obj);
        return redirect('users')->with('success', 'User Created!');
    }
    public function status($id)
    {
        return view('users.edit');
    }
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return response(['message' => 'User delete successfully']);
    }
}
