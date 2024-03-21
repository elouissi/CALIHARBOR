<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngrediantRequest;
use App\Http\Requests\UpdateIngrediantRequest;
use App\Models\Ingrediant;
use App\Repositories\IngrediantRepositoryInterface;

class IngrediantController extends Controller
{
    protected $IngrediantRepositoryInterface;


    public function __construct(IngrediantRepositoryInterface $IngrediantRepositoryInterface){
        $this->IngrediantRepositoryInterface = $IngrediantRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingrediants = $this->IngrediantRepositoryInterface->getAll();
        return view('Dashboard.ingrediants.index',compact('ingrediants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.ingrediants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngrediantRequest $request)
    {
        $form = $request->validated();
 
    
        $imagePath = $request->file('image')->store('ingrediants', 'public');
       $form['image'] = $imagePath;
  
        $this->IngrediantRepositoryInterface->create($form);

                 return redirect()->route('ingrediant.index')->with('success', 'ingrediant créé avec succès');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingrediant $ingrediant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $ingrediant = $this->IngrediantRepositoryInterface->getById($id);
        return view('Dashboard.ingrediants.edit',compact('ingrediant'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngrediantRequest $request, int $id)
    {
        $ingrediant = $this->IngrediantRepositoryInterface->getById($id);


        $form = $request->validated();
 
        if ($request->hasFile('image')) {
         $form['image'] = $request->file('image')->store('ingrediant', 'public');
     } else {
         $form['image'] = $ingrediant->image; // Conserver l'image actuelle si aucun nouveau fichier n'a été téléchargé
     }
 
     $this->IngrediantRepositoryInterface->update($id,$form);
 
     return redirect()->route('ingrediant.index')->with('success', 'ingrediant modifié avec succès');
     
 
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->IngrediantRepositoryInterface->delete($id);
        return redirect()->route('ingrediant.index')->with('success', 'ingrediant suprimée avec succès');
        
    }
}
