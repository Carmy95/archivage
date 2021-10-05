<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
	public function personne()
	{
		return $this->belongsTo('App\Models\Personne');
	}

	public function statu()
	{
		return $this->belongsTo('App\Models\statu');
	}

    public static function countByService($service, $type)
    {
        $test = DB::table('documents')
        ->join('services', 'services.id', '=', 'documents.service_id')
        ->select('*')
        ->where('services.id', $service)
        ->where('documents.type_id', $type)
        ->get();
        dd($test);
    }

}
