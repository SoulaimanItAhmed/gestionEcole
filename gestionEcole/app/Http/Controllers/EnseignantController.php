<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnseignantRequest;
use App\Models\Enseignant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Enseignant::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnseignantRequest $request)
    {
        $validatedData = $request->validated();

        $enseignant = new Enseignant;

        $enseignant->nom = $validatedData['nom'];
        $enseignant->prenom = $validatedData['prenom'];
        $enseignant->date_de_naissance = $validatedData['date_de_naissance'];
        $enseignant->adresse = $validatedData['adresse'];
        $enseignant->email = $validatedData['email'];
        $enseignant->telephone = $validatedData['telephone'];
        $enseignant->classe_id = $validatedData['classe_id'];

        $enseignant->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
