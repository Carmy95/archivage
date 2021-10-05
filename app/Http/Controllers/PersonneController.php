<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirstRequest;
use App\Http\Requests\PersonnelleRequest;
use App\Models\Document;
use App\Models\Personne;
use App\Models\Role;
use App\Models\Service;
use App\Models\Statu;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PersonneController extends Controller
{
    public function __construct()
    {
        $datas = Personne::all();
        if ($datas->isEmpty()) {
            $user = new User();
            $user->connexion = 1;
            $user->email = 'nibondeneaicha@gmail.com';
            $user->password = Hash::make('12345678');
            $user->save();
            $data = new Personne();
            $data->nom = 'Konate';
            $data->prenoms = 'Aicha';
            $data->service_id = 1;
            $data->role_id = 1;
            $data->user_id = 1;
            $data->photo = 'dist/img/user_default.png';
            $data->save();            
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
        $active = 'users';
        $data = Personne::paginate(5);
        return view('personnes.index',compact('users','data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'users';
        $data = Service::all();
        $type = Role::all();
        return view('personnes.create', compact('users','data','type','active'));
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
        $data = Personne::where('role_id', $request->input('role'))->where('service_id', $request->input('service'))->get();
        $dep = Service::findOrFail($request->input('service'));
        $t = 0;
        if (($request->input('role') == 1 ) && $data->isNotEmpty()) {
            foreach ($data as $value) {
                if ($request->input('role') == 1) {
                    $t = $t + 1;
                } else {
                    $t = $t + 0;
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
        $tab['nom'] = $request->input('nom');
        $tab['prenoms'] = $request->input('prenoms');
        $tab['service'] = $request->input('service');
        $tab['mdp'] = $mdp;
        session(['perso' => $tab]);
        $users = User::findOrFail(Auth::user()->id);
        return view('auth.registers', compact('users','mdp'));
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
                $tabs[$t] = 0;$t = $t + 1;
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
                $statu[$t] = 0;$t = $t + 1;
            } else {
                $statu[$t] = ($value * 100) / $doc;$t = $t + 1;
            }
        }
        if ($docs == 0) { $ens = 0; } else { $ens = ($doc * 100) / $docs; }
        if ($serv == 0) { $ser = 0; } else { $ser = ($doc * 100) / $serv; }
        $users = User::findOrFail(Auth::user()->id);
        return view('personnes.show',compact('users','active','data','tab','tab2','docs','doc','serv','tabs','statu','ens','ser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'users';
        $done = Service::all();
        $statu = Role::all();
        $data = Personne::findOrFail($personne->id);
        $doc = Document::where('personne_id',$data->id)->count();
        return view('personnes.edit', compact('users','data','done','statu','active','doc'));
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
                $files = $file->store('profil', 'public');
                $photo = 'storage/'.$files;
            }else {
                session()->flash('photo', 'L\'extenxion de votre photo n\'est pas un .png ou .jpg ou .jpeg');
                return redirect()->route('personnes.edit',$data->id);
            }
        }else {
            $photo = $data->photo;
        }
        if (Auth::user()->personne->service->departement_id == 1 && (Auth::user()->personne->role_id == 1 || Auth::user()->personne->role_id == 2)) {
            $role = $request->input('role');
            $service = $request->input('service');
        } else {
            $role = $data->role_id;
            $service = $data->service_id;
        }

        $data->update([
            'nom' => $request->input('nom'),
            'prenoms' => $request->input('prenoms'),
            'service_id' => $service,
            'role_id' => $role,
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

    public function first()
    {
        $data = Auth::user()->id;
        return view('auth.first',compact('data'));
    }

    public function firstStore(FirstRequest $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update([
            'connexion' => '1',
            'password' => Hash::make($request->input('password'))
        ]);
        $service = Auth::user()->personne->service->id;
        if ($service == 1) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('home');
        }
    }


    public function profil_update(PersonnelleRequest $request, $personne)
    {
        $data = Personne::findOrFail($personne);
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $images =['jpg','jpeg','png'];
            if (in_array($extension,$images)) {
                $files = $file->store('profil', 'public');
                $photo = 'storage/'.$files;
            }else {
                session()->flash('photo', 'L\'extenxion de votre photo n\'est pas un .png ou .jpg ou .jpeg');
                return redirect()->route('clients.edit_profil',$data->id);
            }
        }else {
            $photo = $data->photo;
        }
        $data->update([
            'nom' => $request->input('nom'),
            'prenoms' => $request->input('prenoms'),
            'photo' => $photo,
            ]);
        return redirect()->route('clients.profil',$data->id);
    }
}
