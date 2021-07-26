<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
   
    protected $guarded=['id'];

	public function service()
	{
		return $this->belongsTo('App\Models\service');
	}

	public function type()
	{
		return $this->belongsTo('App\Models\Type');
	}

	public function statu()
	{
		return $this->belongsTo('App\Models\statu');
	}

}
