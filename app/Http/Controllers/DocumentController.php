<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Service;
use App\Models\Type;
use App\Models\Statu;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $users = User::findOrFail(Auth::user()->id);
        $active = 'documents';
        $data = Document::paginate(5);
        return view('documents.index',compact('users','data','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'documents';
        $data = Service::all();
        $type = Type::all();$statu = Statu::all();
        return view('documents.create', compact('users','data','type','statu' ,'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $users = User::findOrFail(Auth::user()->id);
        $data = new Document();
        $ref = Service::findOrFail($request->input('service'));
        $compte = Document::all()->count();
        $compte = $compte + 1;
        $an = date('Y'); $jour = date('md');
        $ser = strtoupper(substr($ref->nom,0,2));
        $ref = $an.''.$jour.''.$ser.''.$compte;
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
                $documents = ['pdf','txt','doc','docs','docx','ppt','xlsx'];
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
                return view('500',compact('users','active'));
            } else {
                $cou = rand(1,10);
                $couv = 'dist/img/bg-img/'.$cou.'.jpg';
                $data->couverture = $couv;
                $data->doc = $filename;
                $data->personne_id = Auth::user()->personne->id;
                $data->save();
                return redirect()->route('documents.index');
            }

        }else {
            $active = 'documents';
            return view('500',compact('users','active'));
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
        $users = User::findOrFail(Auth::user()->id);
        $active = 'documents';
        $data = Document::findOrFail($document->id);
        return view('documents.show',compact('users','active','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $users = User::findOrFail(Auth::user()->id);
        $active = 'documents';
        $done = Service::all();
        $statu = Statu::all();
        $data = Document::findOrFail($document->id);
        return view('documents.edit', compact('users','data','done','statu','active'));
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
        $users = User::findOrFail(Auth::user()->id);
        $service = $users->personne->service_id;
        $data = new Document();
        $ref = Service::findOrFail($service);
        $compte = Document::all()->count();
        $compte = $compte + 1;
        $an = date('Y'); $jour = date('md');
        $ser = strtoupper(substr($ref->nom,0,2));
        $ref = $an.''.$jour.''.$ser.''.$compte;
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
                $documents = ['pdf','txt','doc','docs','docx','ppt','xlsx'];
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
                return view('clients.500',compact('users','active'));
            }else {
                $cou = rand(1,10);
                $couv = 'dist/img/bg-img/'.$cou.'.jpg';
                $data->couverture = $couv;
                $data->doc = $filename;
                $data->personne_id = Auth::user()->personne->id;
                $data->save();
            }
        }else {
            $active = 'documents';
            return view('clients.500',compact('users','active'));
        }
        return redirect()->route('home');
    }

    public function download($id)
    {
        $data = Document::findOrFail($id);
        return response()->download(public_path('storage/'.$data->doc));
    }
}
