<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
	
	protected $guarded=['id'];

	public function departement()
	{
		return $this->belongsTo('App\Models\Departement');
	}

	public function document()
	{
		return $this->hasMany('App\Models\Document');
	}



}
