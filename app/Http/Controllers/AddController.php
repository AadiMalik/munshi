<?php

namespace App\Http\Controllers;

use App\Models\Add;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function index()
    {
        $adds = Add::all();
        return view('adds.index', compact('adds'));
    }

    public function create()
    {
        return view('adds.create');
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
        $obj['image'] = $image;
        $adds = Add::create($obj);
        return redirect('adds')->with('success', 'Add Created!');
    }
    public function edit($id)
    {
        $add = Add::find($id);
        return view('adds.edit', compact('add'));
    }
    public function update(Request $request, $id)
    {
        $old_add = Add::find($id);
        $obj = $request->all();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'public/Images/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $image =  $upload . $filename;
            $obj['image'] = $image;
        } else {
            $obj['image'] = $old_add->image;
        }
        
        unset($obj['_token']);
        unset($obj['_method']);
        $add = Add::where('id', $id)->update($obj);
        return redirect('adds')->with('success', 'Add Created!');
    }
    public function delete(Request $request)
    {
        $add = Add::find($request->id);
        $add->delete();
        return response(['message' => 'add delete successfully']);
    }
}
