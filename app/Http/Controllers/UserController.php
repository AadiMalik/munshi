<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $obj = $request->all();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'public/Images/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $image =  $upload . $filename;
        }
        $obj['password'] = Hash::make($request->password);
        $obj['image'] = $image;
        $user = User::create($obj);
        return redirect('users')->with('success', 'User Created!');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $old_user = User::find($id);
        $obj = $request->all();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'public/Images/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $image =  $upload . $filename;
            $obj['image'] = $image;
        } else {
            $obj['image'] = $old_user->image;
        }
        if($request->password !=null){
            $obj['password'] = Hash::make($request->password);
        }else{
            $obj['password'] = Hash::make($old_user->password);
        }
        if($request->unit_password !=null){
            $obj['password'] = Hash::make($request->unit_password);
        }else{
            $obj['password'] = Hash::make($old_user->unit_password);
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
    public function delete($id)
    {
        return view('users.edit');
    }
}
