<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use Validator;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $company = DB::table('company')->paginate(5);

        // return $techs;
        // return view('techs.index', ['techs' => $techs]);
        return view('company.index', compact('company'));
        
    }
    public function indexApi(Request $request)
    {
        return Company::all();
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $company = DB::table('company')
		->where('name_company','LIKE',"%".$cari."%")
		->paginate();

        return view('company.index', compact('company'));
    }

    public function add(Request $request)
    {
        return view ('company.add'); 
    }

    public function addProcess(Request $request)
    {
        if($request->hasFile('image_company')){
            $resorce       = $request->file('image_company');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/images", $name);
            $save = DB::table('company')->insert([
                'name_company' => $request->name_company,
                'desc_company' => $request->desc_company,
                'image_company' => $name,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        
        return redirect('company')->with('status', 'Data Added Successfully!');
        }
    }  

    public function edit($id)
    {
        $company = DB::table('company')->where('id', $id)->first();
        // dd($techs);
        return view('company/edit',['company'=>$company]);
    }

    public function editProcess(Request $request, $id)
    {
        $company = \App\Company::find($id);
        $company->update($request->all());
        if($request->hasFile('image_company')){
            $request->file('image_company')->move('images/',$request->file('image_company')->getClientOriginalName());
            $company->image_company = $request->file('image_company')->getClientOriginalName();
            $company->save();
        }
        return redirect('company')->with('status', 'Data Edited Successfully!');
    }
    
    public function delete($id)
    {
        DB::table('company')->where('id', $id)->delete();
        
        return redirect('/company')->with('status', 'Data Deleted Successfully!');
    }
        
}
