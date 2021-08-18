<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $guarded=['id'];



	public function user()
	{
		return $this->belongsTo('App\Models\user');
	}

	public function role()
	{
		return $this->belongsTo('App\Models\role');
	}

	public function document()
	{
		return $this->hasMany('App\Models\document');
	}

	public function service()
	{
		return $this->belongsTo('App\Models\service');
	}
}
