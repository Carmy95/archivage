<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\DepartementRequest;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DepartementController extends Controller
{
    public function __construct()
    {
        $data = Departement::all();
        if ($data->isEmpty()) {
            $tab = ['Archivage'];
            foreach ($tab as $value) {
                $new = new Departement();
                $new->nom = $value;
                $new->save();
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'departements';
        $data = Departement::paginate(5);
        return view('departements.index',compact('users','data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'departements';
        return view('departements.create',compact('users','active'));
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
        $users = User::findOrFail(Auth::user()->id);
        $data = Departement::findOrFail($departement->id);
        $service = Service::all()->where('departement_id',$departement->id);
        $total = $service->count();
        $stats = Departement::with('service.document')->where('departements.id',$departement->id)->get();
        $active = 'departements';
        return view('departements.show',compact('users','data','active','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departementt  $departementt
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'departements';
        $data = Departement::findOrFail($departement->id);
        return view('departements.edit',compact('users','data','active'));

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
