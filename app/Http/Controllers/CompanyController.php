<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }
    public function store(Request $request)
    {
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'public/Images/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $image =  $upload . $filename;
        }
        $obj = [
            "name" => $request->name,
            "address" => $request->address ?? '',
            "ceo" => $request->ceo ?? '',
            "phone1" => $request->phone1 ?? '',
            "phone2" => $request->phone2 ?? '',
            "phone3" => $request->phone3 ?? '',
            "phone4" => $request->phone4 ?? '',
            "munshi" => $request->munshi ?? '',
            "munshi_phone" => $request->munshi_phone ?? '',
            "logo" => $image,
        ];
        Company::create($obj);
        return redirect('company')->with('success', 'Company Created!');
    }
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }
    public function update(Request $request, $id)
    {
        $old_company = Company::find($id);
        $obj = $request->all();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'public/Images/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $image =  $upload . $filename;
            $obj['logo'] = $image;
        } else {
            $obj['logo'] = $old_company->logo;
        }
        
        unset($obj['_token']);
        unset($obj['_method']);
        $company = Company::where('id', $id)->update($obj);
        return redirect('company')->with('success', 'Company Created!');
    }
}
