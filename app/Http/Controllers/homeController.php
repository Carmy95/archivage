<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StatuController;
use App\Http\Controllers\TypeController;
use App\Models\Departement;
use App\Models\Document;
use App\Models\Service;
use App\Models\Statu;
use App\Models\Type;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __construct()
    {
        $type = new TypeController();
        $status = new StatuController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = 1;
        $active = 'home';
        $datas = Document::where('service_id',$service)->limit(9)->latest()->get();
        // dd($data);
        // return view('acceuil',compact('active'));
        return view('clients.home',compact('active','datas'));
    }
    public function dashboard()
    {
        $active = 'home';
        $dep = Departement::all()->count();
        $ser = Service::all()->count();
        $doc = Document::all()->count();
        return view('acceuil',compact('active','dep','ser','doc'));
        // return view('clients.home',compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'archive';
        // return view('acceuil',compact('active'));
        $type = Type::all();$statu = Statu::all();
        return view('clients.form',compact('active','type','statu'));
    }
    public function services()
    {
        $service = 1;
        $active = 'service';
        // $documents = Document::paginate(1)->get();
        $documents = Document::where('service_id',$service)->paginate(1);
        // dd($documents);
        // return view('acceuil',compact('active'));
        return view('clients.service',compact('active','documents'));
    }
    public function departement()
    {
        $active = 'departement';
        $departement = 1;
        $documents = Departement::with('service.document')->where('id',$departement)->get()->toArray();
        // Document::where('service_id',$service)->get();
        // dd($documents);
        return view('clients.departement',compact('active','documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('un teste');
        $active = 'documents';
        $data = Document::findOrFail($id);
        return view('clients.show',compact('active','data'));
    }
    public function departshow($id)
    {
        // dd('un teste');
        $active = 'documents';
        $data = Document::findOrFail($id);
        return view('clients.showd',compact('active','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
