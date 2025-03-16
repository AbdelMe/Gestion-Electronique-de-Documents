<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entreprises = Entreprise::all();
        return view('services.create',compact('entreprises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        Service::create([
            'entreprise_id' => $request->entreprise_id,
            'Service' => $request->Service
        ]);
        return redirect()->route('services.index')->with('Added', 'Service added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $entreprises = Entreprise::all();
        return view('services.edit',compact('service',"entreprises"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->update(
            [
                'entreprise_id' => $request->entreprise_id,
                'Service' => $request->Service
            ]
        );
        return redirect()->route('services.index')->with('updated', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('deleted', 'Service deleted successfully!');
    }
}
