<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CovidRequistion;
use Carbon\Carbon;

class CovidRegisterController extends Controller
{
	public function index(){

		return view('covidregister/index');		
	}

    public function store(Request $request){

    	
    	$input = $request->all();
    	$model = new CovidRequistion();

    	$model->fill($input);
    	if(!empty($input['symptom'])){

    		foreach ($input['symptom'] as $val) {
    			$model->setAttribute( $val, 1);
    		}
    	}
    	$model->registered_at = Carbon::now();
    	$model->registration_stage = 1;
    	$model->save();
    	
    	return [
    		'redirect'=>url('paynow')
    	];

    	

    }


    public function paynow(){
    	return view('covidregister/paynow');	
    }


}
