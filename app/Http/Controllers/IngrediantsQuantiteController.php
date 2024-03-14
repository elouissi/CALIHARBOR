<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngrediants_QuantiteRequest;
use App\Http\Requests\UpdateIngrediants_QuantiteRequest;
use App\Models\Ingrediants_Quantite;
use App\Repositories\Ingrediant_QuantitesRepositoryInterface;

class IngrediantsQuantiteController extends Controller
{
    protected $Ingrediant_QuantitesRepositoryInterface;


    public function __construct(Ingrediant_QuantitesRepositoryInterface $Ingrediant_QuantitesRepositoryInterface){
        $this->Ingrediant_QuantitesRepositoryInterface = $Ingrediant_QuantitesRepositoryInterface;
    }
    /**
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingrediant_details = $this->Ingrediant_QuantitesRepositoryInterface->getAll();
        return view('Dashboard.ingrediant_quantite.index',compact('ingrediant_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.ingrediant_quantite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngrediants_QuantiteRequest $request)
    {
        $form = $request->validated();
        $this->Ingrediant_QuantitesRepositoryInterface->create($form);
        return redirect()->route('ingrediant_quantite.index')->with('success', 'les quantitée des ingrediants crée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingrediants_Quantite $ingrediants_Quantite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $quantite = $this->Ingrediant_QuantitesRepositoryInterface->getById($id);
        return view('Dashboard.ingrediant_quantite.edit',compact('quantite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngrediants_QuantiteRequest $request, int $id)
    {
        $form = $request->validated();
        $this->Ingrediant_QuantitesRepositoryInterface->update($id,$form);
        return redirect()->route('ingrediant_quantite.index')->with('success', 'les quantitée des ingrediants modifiée avec succès');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->Ingrediant_QuantitesRepositoryInterface->delete($id);
        return redirect()->route('ingrediant_quantite.index')->with('success', 'les quantitée des ingrediants supprimée avec succès');

    }
}
