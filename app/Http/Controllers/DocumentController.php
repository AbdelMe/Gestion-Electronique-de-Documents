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
        // $request->validate([
        //     'type_document_id' => 'required|exists:type_documents,id',
        //     'dossier_id' => 'required|exists:dossiers,id',
        //     'LibelleDocument' => 'required|string|max:255',
        //     'OCR' => 'required|string|max:255',
        //     'Cote' => 'required|string|max:255',
        //     'Index' => 'required|date',
        //     'Supprimer' => 'required|boolean',
        //     'EnCoursSuppression' => 'required|boolean',
        //     'rubriques' => 'required|array',
        // ]);

        // $manager = new ImageManager(new Driver());
        // $image = $manager->create(893, 1188)->fill('#ffffff');
        // $yPos = 50;
        // $fontSize = 18;
        // $maxWidth = 95;

        // $tempImage = $manager->create(1, 1);
        // $libelleTextWidth = $tempImage->text($request->LibelleDocument, 0, 0, function ($font) {
        //     $font->file(public_path('fonts/Roboto-Regular.ttf'));
        //     $font->size(25);
        //     $font->color('#000000');
        //     $font->align('left');
        //     $font->valign('top');
        // })->width();

        // $imageWidth = 893;
        // $xPosition = ($imageWidth - $libelleTextWidth) / 2;

        // $image->text($request->LibelleDocument, $xPosition, $yPos, function ($font) {
        //     $font->file(public_path('fonts/Roboto-Regular.ttf'));
        //     $font->size(25);
        //     $font->color('#000000');
        //     $font->align('center');
        //     $font->valign('top');
        // });
        // $yPos += 50;

        // if ($request->has('rubriques')) {
        //     foreach ($request->rubriques as $rubrique_id => $value) {
        //         // $rubriqueName = DB::table('rubriques')->where('id', $rubrique_id)->value('Rubrique');
        //         $text = "$value"; // $rubriqueName
        //         $wrappedText = wordwrap($text, $maxWidth, "\n", true);
        //         $lines = explode("\n", $wrappedText);
        //         foreach ($lines as $line) {
        //             $image->text($line, 50, $yPos, function ($font) use ($fontSize) {
        //                 $font->file(public_path('fonts/Roboto-Regular.ttf'));
        //                 $font->size($fontSize);
        //                 $font->color('#000000');
        //                 $font->align('left');
        //                 $font->valign('top');
        //             });
        //             $yPos += 30;
        //         }
        //     }
        // }

        // $path = 'document_images/' . uniqid() . '.png';
        // $ImageToPng = $image->toPng();
        // Storage::disk('public')->put($path, $ImageToPng);

        // Document::create([
        //     'type_document_id' => $request->type_document_id,
        //     'dossier_id' => $request->dossier_id,
        //     'LibelleDocument' => $request->LibelleDocument,
        //     'DocumentNumerique' => $path,
        //     'CheminDocument' => $path,
        //     'OCR' => $request->OCR,
        //     'Date' => now(),
        //     'Cote' => $request->Cote,
        //     'Index' => $request->Index,
        //     'Supprimer' => $request->Supprimer,
        //     'EnCoursSuppression' => $request->EnCoursSuppression,
        // ]);
        // $version = Version::create([
        //     'numero' => ;
        //     'date' => ;
        //     'document_id' => ;

        // ]);
        // dd($request->all());
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

        if ( $request->has('rubriques')) { //!$request->hasFile('CheminDocument') &&
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
        $rub_docs = DB::table('rubrique_documents')->where('document_id',$document->id)->get();
        return view('documents.show', compact('document','rub_docs','document'));
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
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        // dd($request);
        $request->validated();
        $document->update($request->all());
        return redirect()->route('documents.index')->with('updated', 'Document updated successfully!');
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
}
