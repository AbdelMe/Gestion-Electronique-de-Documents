<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Dossier;
use App\Models\RubriqueDocument;
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
        $image = $manager->create(893, 1188)->fill('#ffffff');
        $yPos = 50;
        $fontSize = 18;
        $maxWidth = 95;
    
        $tempImage = $manager->create(1, 1);
        $libelleTextWidth = $tempImage->text($request->LibelleDocument, 0, 0, function ($font) {
            $font->file(public_path('fonts/Roboto-Regular.ttf'));
            $font->size(25);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
        })->width();
    
        $imageWidth = 893;
        $xPosition = ($imageWidth - $libelleTextWidth) / 2;
    
        $image->text($request->LibelleDocument, $xPosition, $yPos, function ($font) {
            $font->file(public_path('fonts/Roboto-Regular.ttf'));
            $font->size(25);
            $font->color('#000000');
            $font->align('center');
            $font->valign('top');
        });
        $yPos += 50;
    
        if ($request->has('rubriques')) {
            foreach ($request->rubriques as $rubrique_id => $value) {
                // $rubriqueName = DB::table('rubriques')->where('id', $rubrique_id)->value('Rubrique');
                $text = "$value"; // $rubriqueName
                $wrappedText = wordwrap($text, $maxWidth, "\n", true);
                $lines = explode("\n", $wrappedText);
                foreach ($lines as $line) {
                    $image->text($line, 50, $yPos, function ($font) use ($fontSize) {
                        $font->file(public_path('fonts/Roboto-Regular.ttf'));
                        $font->size($fontSize);
                        $font->color('#000000');
                        $font->align('left');
                        $font->valign('top');
                    });
                    $yPos += 30;
                }
            }
        }
    
        $path = 'document_images/' . uniqid() . '.png';
        $ImageToPng = $image->toPng();
        Storage::disk('public')->put($path, $ImageToPng);
    
        Document::create([
            'type_document_id' => $request->type_document_id,
            'dossier_id' => $request->dossier_id,
            'LibelleDocument' => $request->LibelleDocument,
            'DocumentNumerique' => $path,
            'CheminDocument' => $path,
            'OCR' => $request->OCR,
            'Date' => now(),
            'Cote' => $request->Cote,
            'Index' => $request->Index,
            'Supprimer' => $request->Supprimer,
            'EnCoursSuppression' => $request->EnCoursSuppression,
        ]);
    
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
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $request->validated();
        $document->update($request->all());
        return redirect()->route('documents.index')->with('updated', 'Document updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {

        if ($document->DocumentNumerique && Storage::disk('public')->exists($document->DocumentNumerique)) {
            Storage::disk('public')->delete($document->DocumentNumerique);
        }
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
