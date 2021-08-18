<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonnelleRequest;
use App\Models\Document;
use App\Models\Personne;
use App\Models\Role;
use App\Models\Service;
use App\Models\Statu;
use App\Models\Type;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'users';
        $data = Personne::paginate(5);
        return view('personnes.index',compact('data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'users';
        $data = Service::all();
        $type = Role::all();
        return view('personnes.create', compact('data','type','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonnelleRequest $request)
    {
        $mdp = str_shuffle($request->input('nom').''.$request->input('prenoms').''.time());
        $max = strlen($mdp);
        $min = rand(8,$max);
        $tab = array();
        $data = Personne::where('role_id', $request->input('role'))->get();
        $dep = Service::findOrFail($request->input('service'));
        $t = 0;
        if (($request->input('role') == 1 || $request->input('role') == 2) && $data->isNotEmpty()) {
            foreach ($data as $value) {
                if ($request->input('role') == 1) {
                    if ($dep->departement_id == $value->service->departement->id) {
                        $t = $t + 1;
                    } else {
                        $t = $t + 0;
                    }
                } else {
                    if ($dep->id == $value->service_id) {
                        $t = $t + 1;
                    } else {
                        $t = $t + 0;
                    }
                }
            }
            if ($t >= 0) {
                $mes = ($request->input('role') == 1) ? 'département' : 'service' ;
                session()->flash('rolerrors', 'Il existe déjà un chef de '.$mes.' pour ce service, veillez choisir un autre role ...');
                return redirect()->route('personnes.create');
            }else {
                $tab['role'] = $request->input('role');
            }
        } else {
            $tab['role'] = $request->input('role');
        }
        $mdp = substr($mdp,0,$min);
        // dd($mdp);
        $tab['nom'] = $request->input('nom');
        $tab['prenoms'] = $request->input('prenoms');
        $tab['service'] = $request->input('service');
        $tab['mdp'] = $mdp;
        session(['perso' => $tab]);
        // $tabs = session('perso');
        // session()->forget('perso');
        // dd(session()->has('perso'));
        // $request->input('nom') = 'test';
        // $request->input('password') =  'test1';
        // $registre = new RegisterController();
        // $password = $p;
        return view('auth.registers', compact('mdp'));
        // $registre->register($request);
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        $active = 'users';
        $data = Personne::findOrFail($personne->id);
        $docs = Document::all()->count();
        $doc = Document::where('personne_id',$data->id)->count();
        $serv = Document::where('service_id',$data->service_id)->count();
        $tab = array();$tab2 = array(); $types = Type::all();$statut = Statu::all();
        $t = 0;$tabs = array();
        foreach ($types as $value) {
            $pdf = Document::where('type_id',$value->id)->where('service_id',$data->service_id)->count();
            $tab[$t] = $pdf;$t = $t + 1;
        }$t = 0;
        foreach ($tab as $value) {
            if ($doc == 0) {
                $tabs[$t] = ($value * 100) / 1;$t = $t + 1;
            } else {
                $tabs[$t] = ($value * 100) / $doc;$t = $t + 1;
            }
        }
        $t = 0;$statu = array();
        foreach ($statut as $value) {
            $pdf = Document::where('statu_id',$value->id)->where('service_id',$data->service_id)->count();
            $tab2[$t] = $pdf;$t = $t + 1;
        }$t = 0;
        foreach ($tab2 as $value) {
            if ($doc == 0) {
                $statu[$t] = ($value * 100) / 1;$t = $t + 1;
            } else {
                $statu[$t] = ($value * 100) / $doc;$t = $t + 1;
            }
        }
        $div = ($docs == 0) ? 1 : $docs ;
        $ens = ($doc * 100) / $div;
        $div = ($serv == 0) ? 1 : $serv ;
        $ser = ($doc * 100) / $div;

        return view('personnes.show',compact('active','data','tab','tab2','docs','doc','serv','tabs','statu','ens','ser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        $active = 'users';
        $done = Service::all();
        $statu = Role::all();
        $data = Personne::findOrFail($personne->id);
        $doc = Document::where('personne_id',$data->id)->count();
        return view('personnes.edit', compact('data','done','statu','active','doc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(PersonnelleRequest $request, Personne $personne)
    {
        $data = Personne::findOrFail($personne->id);
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $images =['jpg','jpeg','png'];
            if (in_array($extension,$images)) {
                $photo = $file->store('profil', 'public');
            }else {
                session()->flash('photo', 'L\'extenxion de votre photo n\'est pas un .png ou .jpg ou .jpeg');
                return redirect()->route('personnes.edit',$data->id);
            }
        }else {
            $photo = $data->photo;
        }
        $data->update([
            'nom' => $request->input('nom'),
            'prenoms' => $request->input('prenoms'),
            'photo' => $photo,
            ]);
        return redirect()->route('personnes.show',$data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        Personne::destroy($personne->id);
        return redirect()->route('personnes.index');
    }
}
