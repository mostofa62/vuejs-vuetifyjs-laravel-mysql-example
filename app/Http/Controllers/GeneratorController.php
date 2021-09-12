<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GeneratorController extends Controller
{
    public function thana_generate(){
    	$thanadb = DB::table('areas')->select(DB::raw('id,eng_name as name'))->where('type_id',10)->get()->toArray();
    	
        
        
        \Storage::disk('public')->put('js/thana.json', json_encode($thanadb));

    }
}
