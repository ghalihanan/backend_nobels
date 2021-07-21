<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Connects;

class ConnectsController extends Controller
{
    public function index()
    {
        {
            $connects = DB::table('connects')->paginate(5);
    
            // return $techs;
            // return view('techs.index', ['techs' => $techs]);
            return view('connects.index', compact('connects'));
            
        }
    }
    public function create(request $request)
    {
        $connects = new Connects;
        $connects->user_name = $request->user_name;
        $connects->user_email = $request->user_email;
        $connects->message = $request->message;
        $connects->save();

        return "Data Berhasil Masuk";
    }
    public function detail($id)
    {
        $connects = DB::table('connects')->where('id', $id)->first();
        // dd($techs);
        return view('connects/detail',['connects'=>$connects]);
    }
}
