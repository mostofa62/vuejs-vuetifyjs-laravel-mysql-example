<?php

namespace App\Util;

use Illuminate\Database\Eloquent\Model;

class Requistion
{
    public static function get_symptoms(){

    	$data = [
    		'fever'=>'Fever',
    		'cough'=>'Cough',
    		'loss_of_taste_smell'=>'Loss of Taste or Smell',
    		'myalgia'=>'Myalgia',
    		'fatigue'=>'Fatigue',
    		'anorexia'=>'Anorexia',
    		'fatigue'=>'Fatigue',
    		'headache'=>'Headache',
    		'diarrhoea'=>'Diarrhoea',
    		/*10=>'Vomiting',
    		11=>'Rhinorrhoea',
    		12=>'Sore Throat',
    		13=>'Red Eye',
    		14=>'Abdominal Pain',
    		15=>'Skin Lesion'*/
    	];

    	return $data;
    }

    public static function get_nidbcnboth(){
    	$data = [

    		1=>'NID',
    		2=>'Birth Certificate',
    		3=>'Both',
    	];
    	return $data;
    }


    public static function get_gender(){
    	$data = [

    		1=>'Male',
    		2=>'Female'
    	];
    	return $data;
    }


}