<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Document;
use App\Models\Personne;
use App\Models\Service;
use App\Models\Statu;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('first');
        $type = new TypeController();
        $status = new StatuController();
        $roles = new RoleController();
        $ser = new ServiceController();
        $per = new PersonneController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::findOrFail(Auth::user()->id);
        $service = $users->personne->service_id;
        $active = 'home';
        $datas = Document::where('service_id',$service)->limit('9')->get();
        return view('clients.home',compact('users','active','datas'));
    }

    public function dashboard()
    {
        $active = 'home';
        $users = User::findOrFail(Auth::user()->id);
        $doc = Document::all()->count();$ser = Service::all()->count();
        $user = Personne::all()->count();
        $tab = array();$types = Type::all();$t = 0;$tabs = array();
        foreach ($types as $value) {
            $pdf = Document::where('type_id',$value->id)->count();
            $tab[$t] = $pdf;$t = $t + 1;
        }$t = 0;
        foreach ($tab as $value) {
            if ($doc == 0) {
                $tabs[$t] = ($value * 100) / 1;$t = $t + 1;
            } else {
                $tabs[$t] = ($value * 100) / $doc;$t = $t + 1;
            }
        }
        return view('acceuil',compact('users','active','doc','ser','tabs','user'));
    }

    public function create()
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'archive';
        $type = Type::all();$statu = Statu::all();
        // return view('acceuil',compact('active'));
        return view('clients.form',compact('users','active','type','statu' ));
    }
    public function services()
    {
        $users = User::findOrFail(Auth::user()->id);
        $service = $users->personne->service_id;
        $active = 'service';
        $documents = Document::where('service_id',$service)->paginate(5);
        return view('clients.service',compact('users','active','documents'));
    }

    public function show($document)
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'service';
        $data = Document::findOrFail($document);
        // dd($data);
        return view('clients.show',compact('users','active','data'));
    }

    public function client_404()
    {
        $active = 'home';
        $users = User::findOrFail(Auth::user()->id);
        return view('clients.404',compact('users','active'));
    }

    public function admin_404()
    {
        $active = 'home';
        $users = User::findOrFail(Auth::user()->id);
        return view('404',compact('users','active'));
    }

    public function deconnecter()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profil($id)
    {
        $active = 'home';
        $users = User::findOrFail(Auth::user()->id);
        if ($id == $users->personne->id) {
            return view('clients.profil',compact('users','active'));
        }else {
            return redirect()->route('clients.404');
        }
    }

    public function edit($id)
    {
        $active = 'home';
        $users = User::findOrFail(Auth::user()->id);
        if ($id == $users->personne->id) {
            return view('clients.profil_edit',compact('users','active'));
        }else {
            return redirect()->route('clients.404');
        }
    }
    public function recherche(Request $request)
    {
        $users = User::findOrFail(Auth::user()->id);
        $nom = $request->input('search');
        $ref = $request->input('search');
        $docbynom = Document::where('nom', $nom)->get();
        $docbyref = Document::where('reference', $ref)->get();
        if($docbynom->isNotEmpty()){
            $datas = $docbynom;
        }elseif ($docbyref->isNotEmpty()) {
            $datas = $docbyref;
        }else{
            $datas = '';
        }
        $active = 'home';
        return view('clients.home',compact('users','active','datas'));
    }
}
