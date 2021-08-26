<?php

namespace App\Http\Controllers;

use App\Models\Statu;
use Illuminate\Http\Request;
use App\Http\Requests\StatuRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatuController extends Controller
{
    public function __construct()
    {
        $data = Statu::all();
        if ($data->isEmpty()) {
            $tab = ['Public','Prive'];
            foreach ($tab as $value) {
                $new = new Statu();
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
        $data = Statu::paginate(5);
        return view('status.index',compact('users','data','active'));
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
        return view('status.create',compact('users','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatuRequest $request)
    {
        $data = new Statu();
        $data->libelle = $request->input('nom');
        $data->save();
        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function show(Statu $statu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'config';
        $data = Statu::findOrFail($id);
        return view('status.edit',compact('users','data','active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function update(StatuRequest $request, Statu $statu)
    {
        $data = Statu::findOrFail($statu->id);
        $data->update([
            'libelle' => $request->input('nom')
            ]);
        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statu  $statu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statu $statu)
    {
        Statu::destroy($statu->id);
        return redirect()->route('status.index');
    }
}
