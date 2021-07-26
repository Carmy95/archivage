<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\DepartementRequest;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'departements';
        $data = Departement::all();
        return view('departements.index',compact('data','active'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'departements';
        return view('departements.create',compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartementRequest $request)
    {
        $data = new Departement();
        $data->nom = $request->input('nom');
        $data->save();
        return redirect()->route('departements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departementt  $departementt
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        $data = Departement::findOrFail($departement->id);
        $service = Service::all()->where('departement_id',$departement->id);
        $total = $service->count();
        $active = 'departements';
        return view('departements.show',compact('data','active','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departementt  $departementt
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        $active = 'departements';
        $data = Departement::findOrFail($departement->id);
        return view('departements.edit',compact('data','active'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departementt  $departementt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        $data = Departement::findOrFail($departement->id);
        $data->update([
            'nom' => $request->input('nom')
            ]);
        return redirect()->route('departements.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departementt  $departementt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        Departement::destroy($departement->id);
        return redirect()->route('departements.index');
    }
}
