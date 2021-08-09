<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    public function __construct()
    {
        $data = Type::all();
        if ($data->isEmpty()) {
            $tab = ['Documents','Images','Media','Autre'];
            foreach ($tab as $value) {
                $new = new Type();
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
        $active = 'config';
        $data = Type::paginate(5);
        return view('types.index',compact('data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'config';
        return view('types.create',compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $data = new type();
        $data->libelle = $request->input('nom');
        $data->save();
        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $active = 'config';
        $data = Type::findOrFail($type->id);
        return view('types.edit',compact('data','active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, Type $type)
    {
        $data = Type::findOrFail($type->id);
        $data->update([
            'libelle' => $request->input('nom')
            ]);
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        Type::destroy($type->id);
        return redirect()->route('types.index');
    }
}
