<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExercises_DetailsRequest;
use App\Http\Requests\UpdateExercises_DetailsRequest;
use App\Models\Exercises_Details;
use App\Repositories\Exercise_DetailsRepositoryInterface;
use Illuminate\Http\Request;

class ExercisesDetailsController extends Controller
{
    protected $Exercise_DetailsRepositoryInterface;


    public function __construct(Exercise_DetailsRepositoryInterface $Exercise_DetailsRepositoryInterface){
        $this->Exercise_DetailsRepositoryInterface = $Exercise_DetailsRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercises_details = $this->Exercise_DetailsRepositoryInterface->getAll();
        return view('Dashboard.details_exercise.index', compact('exercises_details'))->with('success', 'Liste des exercices récupérée avec succès');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.details_exercise.create');
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->repetition == ""){
                $form = $request->validate([
                        'kcal' => 'required',
                        'duree' => 'required',
                    ]);
        
                    $this->Exercise_DetailsRepositoryInterface->create($form);

                    return redirect()->route('exercises_details.index')->with('success', 'Exercice créé avec succès');


    }elseif($request->duree == ""){

            $form =  $request->validate([
                    'kcal' => 'required',
                    'repetition' => 'required',
            ]);

                      $this->Exercise_DetailsRepositoryInterface->create($form);

                      return redirect()->route('exercises_details.index')->with('success', 'Exercice créé avec succès');

     }elseif($request->repetition !== "" && $request->repetition !== "" ){


        return redirect()->back()->withErrors(['error' => 'You cannot fill both repetition and duree fields at the same time.'])->withInput();


     }
    
   

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercises_Details $exercises_Details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
         $details = $this->Exercise_DetailsRepositoryInterface->getById($id);
         return view('Dashboard.details_exercise.edit',compact('details'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        
        if($request->repetition == ""){
            $form = $request->validate([
                    'kcal' => 'required',
                    'duree' => 'required',
                ]);
                // dd($form);
    
                $this->Exercise_DetailsRepositoryInterface->update($id,$form);

                return redirect()->route('exercises_details.index')->with('success', 'Exercice mis à jour avec succès');


          }elseif($request->duree == ""){

                    $form =  $request->validate([
                            'kcal' => 'required',
                            'repetition' => 'required',
                    ]);

                  $this->Exercise_DetailsRepositoryInterface->update($id,$form);

                  return redirect()->route('exercises_details.index')->with('success', 'Exercice mis à jour avec succès');

            }elseif($request->repetition !== "" && $request->repetition !== "" ){


                return redirect()->back()->withErrors(['error' => 'You cannot fill both repetition and duree fields at the same time.'])->withInput();


           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
         $this->Exercise_DetailsRepositoryInterface->delete($id);
         return redirect()->route('exercises_details.index')->with('success', 'Exercice supprimé avec succès');
        
    }
}
