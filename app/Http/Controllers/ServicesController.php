<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services;
use Validator;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $services = DB::table('services')->paginate(5);
        

        // return $techs;
        // return view('techs.index', ['techs' => $techs]);
        return view('services.index', compact('services'));
        
    }
    public function indexApi(Request $request)
    {
        return Services::all();
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $services = DB::table('services')
		->where('title_services','LIKE',"%".$cari."%")
		->paginate();

        return view('services.index', compact('services'));
    }

    public function add(Request $request)
    {
        return view ('services.add'); 
    }

    public function addProcess(Request $request)
    {
        DB::table('services')->insert([
             'title_services' => $request->title_services,
             'desc_services' => $request-> desc_services,
             'created_at' => \Carbon\Carbon::now(),
             'updated_at' => \Carbon\Carbon::now()
        ]);
        return redirect('services')->with('status', 'Data Added Successfully!');
    }


    public function edit($id)
    {
        $services = DB::table('services')->where('id', $id)->first();
        // dd($techs);
        return view('services/edit',['services'=>$services]);
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('services')->where('id', $id)
        ->update([
            'title_services' => $request->title_services,
            'desc_services' => $request-> desc_services,
        ]);
        return redirect('services')->with('status', 'Data Edited Successfully!');
    }

    public function delete($id)
    {
        DB::table('services')->where('id', $id)->delete();
        
        return redirect('/services')->with('status', 'Data Deleted Successfully!');
    }
}