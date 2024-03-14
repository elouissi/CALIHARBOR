<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use App\Repositories\ExerciseRepositoryInterface;

class ExerciseController extends Controller
{
    protected $ExerciseRepositoryInterface;


    public function __construct(ExerciseRepositoryInterface $ExerciseRepositoryInterface){
        $this->ExerciseRepositoryInterface = $ExerciseRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercises = $this->ExerciseRepositoryInterface->getAll();
 
        return view('Dashboard.exercises.index',compact('exercises'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $form = $request->validated();
    
              $imagePath = $request->file('image')->store('exercises', 'public');
             $form['image'] = $imagePath;
        
        $this->ExerciseRepositoryInterface->create($form);
    
        // Redirige vers la liste des exercices
        return redirect()->route('exercises.index')->with('success', 'Exercice créé avec succès');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $exercise = $this->ExerciseRepositoryInterface->getById($id);
        return view('Dashboard.exercises.edit',compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, int $id)
    {
        $exercise = $this->ExerciseRepositoryInterface->getById($id);


       $form = $request->validated();

       if ($request->hasFile('image')) {
        $form['image'] = $request->file('image')->store('exercises', 'public');
    } else {
        $form['image'] = $exercise->image; // Conserver l'image actuelle si aucun nouveau fichier n'a été téléchargé
    }

    $this->ExerciseRepositoryInterface->update($id,$form);

    return redirect()->route('exercises.index')->with('success', 'Exercice modifié avec succès');
    


    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->ExerciseRepositoryInterface->delete($id);
        return redirect()->route('exercises.index')->with('success', 'Exercice suprimée avec succès');
        
    }
}
