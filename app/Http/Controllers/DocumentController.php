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
        $data = Document::paginate(5);
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
        $ref = Service::findOrFail($request->input('service'));
        $compte = Document::all()->count();
        $compte = $compte + 1;
        $an = date('Y'); $jour = date('md');
        $dep = strtoupper(substr($ref->departement->nom,0,2));
        $ser = strtoupper(substr($ref->nom,0,2));
        $ref = $an.''.$dep.''.$jour.''.$ser.''.$compte;
        $data->reference = $ref;
        $data->nom = $request->input('nom');
        $data->service_id = $request->input('service');
        $data->statu_id = $request->input('statu');
        $data->type_id = $request->input('type');
        $data->commentaire = $request->input('commentaire');
        if($request->hasfile('document')){
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            if ($request->input('type') == 1) {
                $documents = ['pdf','txt','doc','docs','ppt','xlsx'];
                if (in_array($extension,$documents)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            } elseif ($request->input('type') == 2) {
                $images =['jpg','jpeg','gif','png'];
                if (in_array($extension,$images)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            } elseif ($request->input('type') == 3) {
                $medias = ['mp3','mp4','avi','mpg'];
                if (in_array($extension,$medias)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            } else{
                $autres = ['zip','rar','7z','cab','iso'];
                if (in_array($extension,$autres)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            }
            if (empty($filename)) {
                $active = 'documents';
                return view('500',compact('active'));
            } else {
                $cou = rand(1,9);
                $couv = 'dist/img/bg-img/'.$cou.'.jpg';
                $data->couverture = $couv;
                $data->doc = $filename;
                $data->save();
                return redirect()->route('documents.index');
            }

        }else {
            $active = 'documents';
            return view('500',compact('active'));
        }
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
        $data = Document::findOrFail($document->id);
        return view('documents.show',compact('active','data'));
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
        $statu = Statu::all();
        $data = Document::findOrFail($document->id);
        return view('documents.edit', compact('data','done','statu','active'));
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
            'statu_id' => $request->input('statu'),
            'commentaire' => $request->input('commentaire'),
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


    public function clientstore(DocumentRequest $request)
    {
        $service = 1;
        $data = new Document();
        $ref = Service::findOrFail($service);
        $compte = Document::all()->count();
        $compte = $compte + 1;
        $an = date('Y'); $jour = date('md');
        $dep = strtoupper(substr($ref->departement->nom,0,2));
        $ser = strtoupper(substr($ref->nom,0,2));
        $ref = $an.''.$dep.''.$jour.''.$ser.''.$compte;
        $data->reference = $ref;
        $data->nom = $request->input('nom');
        $data->service_id = $service;
        $data->statu_id = $request->input('statu');
        $data->type_id = $request->input('type');
        $data->commentaire = $request->input('commentaire');
        if($request->hasfile('document')){
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            if ($request->input('type') == 1) {
                $documents = ['pdf','txt','doc','docs','ppt','xlsx'];
                if (in_array($extension,$documents)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            } elseif ($request->input('type') == 2) {
                $images =['jpg','jpeg','gif','png'];
                if (in_array($extension,$images)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            } elseif ($request->input('type') == 3) {
                $medias = ['mp3','mp4','avi','mpg'];
                if (in_array($extension,$medias)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            } else{
                $autres = ['zip','rar','7z','cab','iso'];
                if (in_array($extension,$autres)) {
                    $filename = $file->store('archive', 'public');
                }else {
                    $filename = '';
                }
            }
            if (empty($filename)) {
                $active = 'documents';
                return view('clients.500',compact('active'));
            }else {
                $cou = rand(1,9);
                $couv = 'dist/img/bg-img/'.$cou.'.jpg';
                $data->couverture = $couv;
                $data->doc = $filename;
                $data->save();
            }
        }else {
            $active = 'documents';
            return view('clients.500',compact('active'));
        }
        return redirect()->route('home');
    }

    public function download($id)
    {
        $data = Document::findOrFail($id);
        return response()->download(public_path('storage/'.$data->doc));
    }
}
