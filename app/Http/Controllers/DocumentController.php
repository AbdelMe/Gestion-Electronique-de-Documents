<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Dossier;
use App\Models\RubriqueDocument;
use App\Models\TypeDocument;
use App\Models\Version;
use Illuminate\Database\QueryException;
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
        $documents = Document::all();
        return view('documents.index', ['documents' => $documents]); //compact('documents')
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
            'titre' => 'required|string|max:255',
            // 'Date' => now(),
            'metadata' => 'nullable|string',
            'tag' => 'nullable|string',
            'CheminDocument' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg,xlsx,csv,xls,|max:2048',
            'etat_id' => 'nullable|exists:etats,id',
            'classe_id' => 'nullable|exists:classes,id',
            'dossier_id' => 'nullable|exists:dossiers,id',
            'type_document_id' => 'nullable|exists:type_documents,id',
            'rubriques' => 'nullable|array',
        ]);

        $document = new Document();
        $document->titre = $request->titre;
        $document->Date = now();
        $document->metadata = $request->metadata;
        $document->tag = $request->tag;
        $document->etat_id = $request->etat_id;
        $document->classe_id = $request->classe_id;
        $document->dossier_id = $request->dossier_id;
        $document->type_document_id = $request->type_document_id;

        if ($request->hasFile('CheminDocument')) {
            $file = $request->file('CheminDocument');
            $filePath = $file->store('documents', 'public');
            $document->CheminDocument = $filePath;
        }

        $document->save();

        $document->versions()->create([
            'numero' => 1,
            'date' => now(),
            'description' => 'Version initiale',
        ]);

        if ($request->has('rubriques')) { //!$request->hasFile('CheminDocument') &&
            foreach ($request->rubriques as $rubrique_id => $valeur) {
                if (!empty($valeur)) {
                    RubriqueDocument::create([
                        'rubrique_id' => $rubrique_id,
                        'Valeur' => $valeur,
                        'document_id' => $document->id,
                    ]);
                }
            }
        }
        // else{

        //     return redirect()->route('documents.index')->with('Added', 'Document Added successfully!');
        // }
        return redirect()->route('documents.index')->with('Added', 'Document Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        $document->load([
            'TypeDocument',
            'Dossier',
            'Etat',
            'RubriqueDocument.rubrique'
        ]);
        $rub_docs = DB::table('rubrique_documents')->where('document_id', $document->id)->get();
        return view('documents.show', compact('document', 'rub_docs', 'document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $typeDocuments = TypeDocument::all();
        $dossiers = Dossier::all();
        return view('documents.edit', ['document' => $document, 'typeDocuments' => $typeDocuments, 'dossiers' => $dossiers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'metadata' => 'nullable|string',
            'tag' => 'nullable|string',
            'CheminDocument' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg,xlsx,csv,xls|max:2048',
            'etat_id' => 'nullable|exists:etats,id',
            'classe_id' => 'nullable|exists:classes,id',
            'dossier_id' => 'nullable|exists:dossiers,id',
            'type_document_id' => 'nullable|exists:type_documents,id',
            'rubriques' => 'nullable|array',
        ]);
    
        // Update basic document fields
        $document->titre = $request->titre;
        $document->Date = now();
        $document->metadata = $request->metadata;
        $document->tag = $request->tag;
        $document->etat_id = $request->etat_id;
        $document->classe_id = $request->classe_id;
        $document->dossier_id = $request->dossier_id;
        $document->type_document_id = $request->type_document_id;
    
        // Handle file upload if present
        if ($request->hasFile('CheminDocument')) {
            // Delete old file if it exists
            if ($document->CheminDocument) {
                Storage::disk('public')->delete($document->CheminDocument);
            }
            
            $file = $request->file('CheminDocument');
            $filePath = $file->store('documents', 'public');
            $document->CheminDocument = $filePath;
        }
    
        $document->save();
    
        // Handle rubriques
        if ($request->has('rubriques')) {
            foreach ($request->rubriques as $rubrique_id => $valeur) {
                // Check if rubrique exists for this document
                $existingRubrique = RubriqueDocument::where([
                    'rubrique_id' => $rubrique_id,
                    'document_id' => $document->id
                ])->first();
    
                if (!empty($valeur)) {
                    if ($existingRubrique) {
                        // Update existing rubrique
                        $existingRubrique->update(['Valeur' => $valeur]);
                    } else {
                        // Create new rubrique
                        RubriqueDocument::create([
                            'rubrique_id' => $rubrique_id,
                            'Valeur' => $valeur,
                            'document_id' => $document->id,
                        ]);
                    }
                } elseif ($existingRubrique) {
                    // Delete rubrique if value is empty and it exists
                    $existingRubrique->delete();
                }
            }
        }
    
        return redirect()->route('documents.index')->with('Updated', 'Document updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {

        try {
            if ($document->DocumentNumerique && Storage::disk('public')->exists($document->DocumentNumerique)) {
                Storage::disk('public')->delete($document->DocumentNumerique);
            }
            $document->delete();
            return redirect()->route('documents.index')->with('deleted', 'Document deleted successfully!');
        } catch (QueryException) {
            return to_route('documents.index')->with('warning', "Impossible de supprimer ce Document car il est lié à autres données.");
        }
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

    // public function download(Document $document)
    // {
    //     $path = storage_path('app/public/' . $document->CheminDocument);
    //     $headers = [
    //         'Content-Type' => mime_content_type($path),
    //         'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
    //     ];
    //     return response()->file($path, $headers);
    // }

    public function download(Document $document)
    {
        $path = storage_path('app/public/' . $document->CheminDocument);

        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }

        // Get file MIME type and extension
        $mimeType = mime_content_type($path);
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        // Force download for all file types (including PDFs and images)
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . basename($path) . '"'
        ];

        return response()->download($path, basename($path), $headers);
    }
}
