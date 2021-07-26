<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Service;
use App\Models\Type;
use App\Models\Statu;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;

class DocumentController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'documents';
        $data = Document::all();
        return view('documents.index',compact('data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'documents';
        $data = Service::all();
        $type = Type::all();$statu = Statu::all();
        return view('documents.create', compact('data','type','statu' ,'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        // dd('ok');
        $data = new Document();
        $data->nom = $request->input('nom');
        $data->service_id = $request->input('service');
        $data->statu_id = $request->input('statu');
        $data->type_id = $request->input('type');
        $data->doc = $request->input('document');
        $data->save();
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $active = 'documents';
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $active = 'documents';
        $done = Service::all();
        $data = Documents::findOrFail($document->id);
        return view('documents.edit', compact('data','done','active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, Document $document)
    {
        $data = Document::findOrFail($document->id);
        $data->update([
            'nom' => $request->input('nom'),
            'service_id' => $request->input('service'),
            ]);
        return redirect()->route('documents.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        Document::destroy($document->id);
        return redirect()->route('documents.index');
    }
}
