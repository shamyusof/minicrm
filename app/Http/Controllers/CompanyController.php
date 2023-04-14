<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        //$companies = Company::orderBy('id', 'ASC')->paginate(10);
        $companies = Company::paginate(10);
        //return view('company.index');
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'   => 'required|min:3',
            'email'     => 'required|min:5',
            'logo'     => 'required|image|mimes:jpeg,jpg,png|max:2048|dimensions:min_width=100,min_height=100',
            'website'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('logo');
        $image->storeAs('public', $image->hashName());

        //create post
        Company::create([
            'name'      => $request->name,
            'email'      => $request->email,
            'logo'     => $image->hashName(),
            'website'   => $request->website
        ]);

        //redirect to index
        return redirect()->route('company.index')->with(['success' => 'Data has been added successfully!']);
        //return view('company.index');
    }

    public function show(string $id)
    {
        //get post by ID
        $company = Company::findOrFail($id);

        //render view with post
        return view('company.show', compact('company'));
    }

    public function edit(string $id)
    {
        //get post by ID
        $company = Company::findOrFail($id);

        //render view with post
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'name'   => 'required|min:3',
            'email'     => 'required|min:5',
            'logo'     => 'image|mimes:jpeg,jpg,png|max:2048|dimensions:min_width=100,min_height=100',
            'website'   => 'required|min:10'
        ]);

        //get post by ID
        $company = Company::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('logo')) {

            //upload new image
            $image = $request->file('logo');
            $image->storeAs('public/', $image->hashName());

            //delete old image
            Storage::delete('public/'.$company->image);

            //update post with new image
            $company->update([
                'name'      => $request->name,
                'email'      => $request->email,
                'logo'     => $image->hashName(),
                'website'   => $request->website
            ]);

        } else {

            //update post without image
            $company->update([
                'name'      => $request->name,
                'email'      => $request->email,
                'website'   => $request->website
            ]);
        }

        //redirect to index
        return redirect()->route('company.index')->with(['success' => 'Data has been updated successfully!']);
    }

    public function destroy($id)
    {
        //get post by ID
        $company = Company::findOrFail($id);

        //delete image
        Storage::delete('public/'. $company->logo);

        //delete post
        $company->delete();

        //redirect to index
        return redirect()->route('company.index')->with(['success' => 'Data has been deleted successfully!']);
    }
}
