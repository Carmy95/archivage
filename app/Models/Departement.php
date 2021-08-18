<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $guarded=['id'];

	public function service()
	{
		return $this->hasMany('App\Models\Service');
	}

	public function serviceDocument()
	{
		return $this->hasOneThrough('App\Models\document','App\Models\service');
	}

}
