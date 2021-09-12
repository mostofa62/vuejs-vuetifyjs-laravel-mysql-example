<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovidRequistion extends Model
{
    //
    protected $table='covid_requistion';

    protected $fillable = [
    	'name',
    	'age',
    	'gender',
    	'mobile_no',
    	'thana',
    	'address',
    	'nid',
    	'bcn'

    ];

    /*protected $guarded = [
    	'fever',
    	'cough',
    	'loss_of_taste_smell',
    	'myalgia',
    	'fatigue',
    	'anorexia',
    	'fatigue',
    	'headache',
    	'diarrhoea'
    ];*/
}
