<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Projects;
use Validator;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $projects = DB::table('projects')->paginate(5);

        // return $techs;
        // return view('techs.index', ['techs' => $techs]);
        return view('projects.index', compact('projects'));
        
    }
    public function indexApi(Request $request)
    {
        return Projects::all();
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $projects = DB::table('projects')
		->where('title_projects','LIKE',"%".$cari."%")
		->paginate();

        return view('projects.index', compact('projects'));
    }

    public function add(Request $request)
    {
        return view ('projects.add'); 
    }

    public function addProcess(Request $request)
    {
        if($request->hasFile('image_projects')){
            $resorce       = $request->file('image_projects');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/images", $name);
            $save = DB::table('projects')->insert([
                'title_projects' => $request->title_projects,
                'desc_projects' => $request->desc_projects,
                'image_projects' => $name,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        
        return redirect('projects')->with('status', 'Data Added Successfully!');
        }
    }  

    public function edit($id)
    {
        $projects = DB::table('projects')->where('id', $id)->first();
        // dd($techs);
        return view('projects/edit',['projects'=>$projects]);
    }

    public function editProcess(Request $request, $id)
    {
        $projects = \App\Projects::find($id);
        $projects->update($request->all());
        if($request->hasFile('image_projects')){
            $request->file('image_projects')->move('images/',$request->file('image_projects')->getClientOriginalName());
            $projects->image_projects= $request->file('image_projects')->getClientOriginalName();
            $projects->save();
        }
        return redirect('projects')->with('status', 'Data Edited Successfully!');
    }
    
    public function delete($id)
    {
        DB::table('projects')->where('id', $id)->delete();
        
        return redirect('/projects')->with('status', 'Data Deleted Successfully!');
    }
        
}