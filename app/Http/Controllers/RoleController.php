<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $data = Role::all();
        if ($data->isEmpty()) {
            $tab = ['Chef du departement','Chef du Service','Employee'];
            foreach ($tab as $value) {
                $new = new Role();
                $new->libelle = $value;
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
        $active = 'config';
        $data = Role::paginate(5);
        return view('roles.index',compact('users','data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'config';
        return view('roles.create',compact('users','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Role();
        $data->libelle = $request->input('nom');
        $data->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'config';
        $data = Role::findOrFail($role->id);
        return view('roles.edit',compact('users','data','active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = Role::findOrFail($role->id);
        $data->update([
            'libelle' => $request->input('nom')
            ]);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::destroy($role->id);
        return redirect()->route('roles.index');
    }
}
