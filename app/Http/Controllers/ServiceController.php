<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\User;
use App\Models\Type;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $data = Service::all();
        if ($data->isEmpty()) {
            $tab = ['Archives'];
            foreach ($tab as $value) {
                $new = new Service();
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
        $active = 'services';
        $data = Service::paginate(5);
        return view('services.index',compact('users','data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'services';
        return view('services.create',compact('users','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = new Service();
        $data->nom = $request->input('nom');
        $data->save();
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $users = User::findOrFail(Auth::user()->id);
        $data = Service::findOrFail($service->id);
        $active = 'services';
        $tab = array(); $types = Type::all();
        $t = 0;
        foreach ($types as $value) {
            $pdf = Document::where('type_id',$value->id)->where('service_id',$service->id)->count();
            $tab[$t] = $pdf;$t = $t + 1;
        }
        return view('services.show',compact('users','data','tab','active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'services';
        $data = Service::findOrFail($service->id);
        return view('services.edit', compact('users','data','active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $data = Service::findOrFail($service->id);
        $data->update([
            'nom' => $request->input('nom'),
            ]);
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Service::destroy($service->id);
        return redirect()->route('services.index');
    }
}
