<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Document;
use App\Models\Personne;
use App\Models\Service;
use App\Models\Statu;
use App\Models\Type;
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
        // $this->middleware('auth');
        $type = new TypeController();
        $status = new StatuController();
        $roles = new RoleController();
        $dep = new DepartementController();
        $ser = new ServiceController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active = 'home';
        $datas = Document::limit('9')->get();
        return view('clients.home',compact('active','datas'));
    }

    public function dashboard()
    {
        $active = 'home';
        $doc = Document::all()->count();$ser = Service::all()->count();
        $dep = Departement::all()->count();
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
        return view('acceuil',compact('active','doc','ser','dep','tabs','user'));
    }

    public function create()
    {
        $active = 'archive';
        $type = Type::all();$statu = Statu::all();
        // return view('acceuil',compact('active'));
        return view('clients.form',compact('active','type','statu' ));
    }
    public function services()
    {
        $service = 1;
        $active = 'service';
        // return view('acceuil',compact('active'));
        $documents = Document::where('service_id',$service)->paginate(5);
        return view('clients.service',compact('active','documents'));
    }
    public function departement()
    {
        $active = 'departement';
        // return view('acceuil',compact('active'));
        return view('clients.departement',compact('active'));
    }

    public function show($document)
    {
        $active = 'service';
        $data = Document::findOrFail($document);
        // dd($data);
        return view('clients.show',compact('active','data'));
    }

    public function deconnecter()
    {
        Auth::logout();
    }
}
