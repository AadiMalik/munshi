<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activity = Activity::orderBy('name','ASC')->get();
        return view('activity.index', compact('activity'));
    }

    public function create()
    {
        return view('activity.create');
    }
    public function store(Request $request)
    {
        $obj = $request->all();
        $activity = Activity::create($obj);
        return redirect('activity')->with('success', 'Activity Created!');
    }
    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('activity.edit', compact('activity'));
    }
    public function update(Request $request, $id)
    {
        $obj = $request->all();
        unset($obj['_token']);
        unset($obj['_method']);
        $activity = Activity::where('id', $id)->update($obj);
        return redirect('activity')->with('success', 'Activity Updated!');
    }
}
