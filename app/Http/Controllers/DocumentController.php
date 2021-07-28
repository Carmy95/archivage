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
        $data = new Document();
        $data->nom = $request->input('nom');
        $data->service_id = $request->input('service');
        $data->statu_id = $request->input('statu');
        $data->type_id = $request->input('type');
        if($request->hasfile('document')){
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            if ($request->input('type') == 1) {
                $documents = ['pdf','txt','doc','docs','ppt','xlsx'];
                if (in_array($extension,$documents)) {
                    $filename = $file->store('archive', 'public');
                }
            } elseif ($request->input('type') == 2) {
                $images =['jpg','jpeg','gif','png'];
                if (in_array($extension,$images)) {
                    $filename = $file->store('archive', 'public');
                }
            } elseif ($request->input('type') == 3) {
                $medias = ['mp3','mp4','avi','mpg'];
                if (in_array($extension,$medias)) {
                    $filename = $file->store('archive', 'public');
                }
            } else{
                $autres = ['zip','rar','7z','cab','iso'];
                if (in_array($extension,$autres)) {
                    $filename = $file->store('archive', 'public');
                }
            }
            $cou = rand(1,9);
            $couv = 'dist/img/bg-img/'.$cou.'jpg';
            $data->couverture = $couv;
            $data->doc = $filename;
            $data->save();
        }else {

        }
        return redirect()->route('documents.index');
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
