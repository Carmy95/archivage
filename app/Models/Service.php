<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

	protected $guarded=['id'];


	public function document()
	{
		return $this->hasMany('App\Models\Document');
	}

	public function personne()
	{
		return $this->hasMany('App\Models\Personne');
	}



}
