<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepatRequest;
use App\Http\Requests\UpdateRepatRequest;
use App\Models\Repat;
use App\Repositories\IngrediantRepositoryInterface;
use App\Repositories\RepatRepositoryInterface;
use Illuminate\Http\Request;

class RepatController extends Controller
{
    protected $RepatRepositoryInterface;
    protected $IngrediantRepositoryInterface;


    public function __construct(RepatRepositoryInterface $RepatRepositoryInterface,IngrediantRepositoryInterface $IngrediantRepositoryInterface,){
        $this->RepatRepositoryInterface = $RepatRepositoryInterface;
        $this->IngrediantRepositoryInterface = $IngrediantRepositoryInterface;
    }
    /**
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repats = Repat::with('ingrediants')->get();
          return view('Dashboard.repat.index', compact('repats'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingrediants = $this->IngrediantRepositoryInterface->getAll();
        return view('Dashboard.repat.create',compact('ingrediants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = $request->validate([
            'nom' => 'required',
            'description' => 'required'
        ]);
        $ingrediants = $request->input('ingrediants');
        $quantites = $request->input('quantites');
        
 

 
        $repat = $this->RepatRepositoryInterface->create($form);
        $ingrediantsWithQuantites = [];
        for ($i = 0; $i < count($ingrediants); $i++) {
            $ingrediantsWithQuantites[$ingrediants[$i]] = ['quantite' => $quantites[$i]];
        }
        
        $repat->ingrediants()->attach($ingrediantsWithQuantites);     
        return redirect()->route('repat.index');   
    }

    /**
     * Display the specified resource.
     */
    public function show(Repat $repat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repat $repat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepatRequest $request, Repat $repat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->RepatRepositoryInterface->delete($id);
        return redirect()->back();
        
    }
}
