<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Dossier;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::paginate(5);
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeDocuments = TypeDocument::all();
        $dossiers = Dossier::all();
        return view('documents.create', compact('typeDocuments', 'dossiers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_document_id' => 'required|exists:type_documents,id',
            'dossier_id' => 'required|exists:dossiers,id',
            'LibelleDocument' => 'required|string|max:255',
            'OCR' => 'required|string|max:255',
            'Cote' => 'required|string|max:255',
            'Index' => 'required|date',
            'Supprimer' => 'required|boolean',
            'EnCoursSuppression' => 'required|boolean',
            'rubriques' => 'required|array',
        ]);
    
        $manager = new ImageManager(new Driver());
        $image = $manager->create(400, 600)->fill('#ffffff');
        $yOffset = 50;
        $fontSize = 20;
        $maxWidth = 60;
    
        // Add rubriques to the image
        if ($request->has('rubriques')) {
            foreach ($request->rubriques as $rubrique_id => $value) {
                // $rubriqueName = DB::table('rubriques')->where('id', $rubrique_id)->value('Rubrique');
                $text = "$value"; //$rubriqueName: 
                    $wrappedText = wordwrap($text, $maxWidth, "\n", true);
                    $lines = explode("\n", $wrappedText);
    
                foreach ($lines as $line) {
                    $image->text($line, 50, $yOffset, function ($font) use ($fontSize) {
                        $font->size($fontSize);
                        $font->color('#000000');
                        $font->align('left');
                        $font->valign('top');
                    });
                    $yOffset += 20;
                }
            }
        }
    

    
        return redirect()->route('documents.index')->with('Added', 'Document Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $typeDocuments = TypeDocument::all();
        $dossiers = Dossier::all();
        return view('documents.edit', compact('document', 'typeDocuments', 'dossiers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $document->update($request->all());
        return redirect()->route('documents.index')->with('updated', 'Document updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index')->with('deleted', 'Document deleted successfully!');
    }



    public function SelectedType(Request $request)
    {
        $selectedType = $request->query('type_document_id');

        $rebrique = DB::table('rubriques')->where('type_document_id', $selectedType)->get();
        // $rebrique = DB::table('rubriques')->find(9);

        dd($rebrique);
        $typeDocuments = TypeDocument::all();
        $dossiers = Dossier::all();

        return view('documents.create', compact('selectedType', 'typeDocuments', 'dossiers'));
    }
}
