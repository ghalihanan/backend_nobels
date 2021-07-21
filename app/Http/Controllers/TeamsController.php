<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teams;
use Validator;

class TeamsController extends Controller
{
    public function index(Request $request)
    {
        $teams = DB::table('teams')->paginate(5);
        

        // return $techs;
        // return view('techs.index', ['techs' => $techs]);
        return view('teams.index', compact('teams'));
        
    }
    public function indexApi(Request $request)
    {
        return Teams::all();
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $teams = DB::table('teams')
		->where('name_teams','LIKE',"%".$cari."%")
		->paginate();

        return view('teams.index', compact('teams'));
    }

    public function add(Request $request)
    {
        return view ('teams.add'); 
    }


    public function addProcess(Request $request)
    {
        $teamsGambar = $request->image_teams;
        $namaFile = $teamsGambar->getClientOriginalName();

        $teams = new Teams;
        $teams->name_teams = $request->name_teams;
        $teams->email_teams = $request->email_teams;
        $teams->position_teams = $request->position_teams;
        $teams->image_teams = $namaFile;

        $teamsGambar->move('images/',$request->file('image_teams')->getClientOriginalName());
        $teams->save();

        return redirect('teams')->with('status', 'Data Added Successfully!');
    }  

    public function edit($id)
    {
        $teams = DB::table('teams')->where('id', $id)->first();
        // dd($techs);
        return view('teams/edit',['teams'=>$teams]);
    }
    
    public function editProcess(Request $request, $id)
    {
        $teams = \App\Teams::find($id);
        $teams->update($request->all());
        if($request->hasFile('image_teams')){
            $request->file('image_teams')->move('images/',$request->file('image_teams')->getClientOriginalName());
            $teams->image_teams = $request->file('image_teams')->getClientOriginalName();
            $teams->save();
        }
        return redirect('teams')->with('status', 'Data Edited Successfully!');
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
        DB::table('teams')->where('id', $id)->delete();
        
        return redirect('/teams')->with('status', 'Data Deleted Successfully!');
    }
}
