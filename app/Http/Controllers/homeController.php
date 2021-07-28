<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StatuController;
use App\Http\Controllers\TypeController;
use App\Models\Statu;
use App\Models\Type;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __construct()
    {
        $type = new TypeController();
        $status = new StatuController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'home';
        // return view('acceuil',compact('active'));
        return view('clients.home',compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'archive';
        // return view('acceuil',compact('active'));
        $type = Type::all();$statu = Statu::all();
        return view('clients.form',compact('active','type','statu'));
    }
    public function services()
    {
        $active = 'service';
        // return view('acceuil',compact('active'));
        return view('clients.service',compact('active'));
    }
    public function departement()
    {
        $active = 'departement';
        // return view('acceuil',compact('active'));
        return view('clients.departement',compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
