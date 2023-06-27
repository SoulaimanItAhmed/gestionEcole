<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $eleves = Eleve::with('classe')->get();
        return response()->json($eleves);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $attr = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_de_naissance' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'classe_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if($attr['role'] == 'eleve'){
            $user = User::create([
                'name' => $attr['nom'],
                'email' => $attr['email'],
                'password' => bcrypt($attr['password']),
                'role' => $attr['role'],
                'remember_token' => Str::random(10)
            ]);


            Eleve::create([
                'nom' => $attr['nom'],
                'prenom' => $attr['prenom'],
                'date_de_naissance' => $attr['date_de_naissance'],
                'adresse' => $attr['adresse'],
                'telephone' => $attr['telephone'],
                'classe_id' => $attr['classe_id'],
                'user_id' => $user->id,
    
            ]);
        }
    


        // $validatedData = $request->validated();
        // // $request->validate([
        // //     'nom' => 'required|min:2|max:25',
        // //     'prenom' => 'required|min:2|max:25',
        // //     'date_de_naissance' => 'required',
        // //     'adresse' => 'required|min:3|max:255',
        // //     'email' => 'required|min:5|max:100',
        // //     'telephone' => 'required|min:8|max:16',
        // //     'classe_id' => 'required',
        // // ]);
        // $eleve = new Eleve;

        // $eleve->nom = $validatedData['nom'];
        // $eleve->prenom = $validatedData['prenom'];
        // $eleve->date_de_naissance = $validatedData['date_de_naissance'];
        // $eleve->adresse = $validatedData['adresse'];
        // $eleve->email = $validatedData['email'];
        // $eleve->telephone = $validatedData['telephone'];
        // $eleve->classe_id = $validatedData['classe_id'];

        // $eleve->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(Eleve::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eleve = Eleve::find($id);

        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_de_naissance' => 'required|date',
            'adresse' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'classe_id' => 'required|exists:classes,id',
        ]);
        
        $eleve->nom = $validatedData['nom'];
        $eleve->prenom = $validatedData['prenom'];
        $eleve->date_de_naissance = $validatedData['date_de_naissance'];
        $eleve->adresse = $validatedData['adresse'];
        $eleve->email = $validatedData['email'];
        $eleve->telephone = $validatedData['telephone'];
        $eleve->classe_id = $validatedData['classe_id'];

        $eleve->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $eleve = Eleve::findOrFail($id);
            $eleve->delete();

            return response()->json(['message' => 'Student deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete student'], 500);
        }
    }

}