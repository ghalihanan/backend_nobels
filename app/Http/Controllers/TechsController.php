<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Techs;
use Validator;

class TechsController extends Controller
{
    public function index(Request $request)
    {
        $techs = DB::table('techs')->paginate(5);
        

        // return $techs;
        // return view('techs.index', ['techs' => $techs]);
        return view('techs.index', compact('techs'));
        
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $techs = DB::table('techs')
		->where('title_techs','LIKE',"%".$cari."%")
		->paginate();

        return view('techs.index', compact('techs'));
    }

    public function add(Request $request)
    {
        return view ('techs.add'); 
    }


    public function addProcess(Request $request)
    {
        $techsGambar = $request->image_techs;
        $namaFile = $techsGambar->getClientOriginalName();

        $techs = new Techs;
        $techs->title_techs = $request->title_techs;
        $techs->image_techs = $namaFile;

        $techsGambar->move('images/',$request->file('image_techs')->getClientOriginalName());
        $techs->save();

        return redirect('techs')->with('status', 'Data Added Successfully!');



        // DB::table('techs')->insert([
        //      'title_techs' => $request->title_techs,
        //      'image_techs' => $request-> image_techs,
        //      'created_at' => \Carbon\Carbon::now(),
        //      'updated_at' => \Carbon\Carbon::now()
        // ]);
        // return redirect('techs')->with('status', 'Data Added Successfully!');
        
    }  

    public function edit($id)
    {
        $techs = DB::table('techs')->where('id', $id)->first();
        // dd($techs);
        return view('techs/edit',['techs'=>$techs]);
    }
    
    public function editProcess(Request $request, $id)
    {
        $techs = \App\Techs::find($id);
        $techs->update($request->all());
        if($request->hasFile('image_techs')){
            $request->file('image_techs')->move('images/',$request->file('image_techs')->getClientOriginalName());
            $techs->image_techs = $request->file('image_techs')->getClientOriginalName();
            $techs->save();
        }
        return redirect('techs')->with('status', 'Data Edited Successfully!');
        // dd($request->all());
        // DB::table('techs')->where('id', $id)
        // ->update([
        //     'title_techs' => $request->title_techs,
        //     'image_techs' => $request-> image_techs,
        // ]);
        // return redirect('techs')->with('status', 'Data Edited Successfully!');
    }

    public function delete($id)
    {
        DB::table('techs')->where('id', $id)->delete();
        
        return redirect('/techs')->with('status', 'Data Deleted Successfully!');
    }
}
