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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        //
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
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
