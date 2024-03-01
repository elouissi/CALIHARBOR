<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParkRequest;
use App\Http\Requests\UpdateParkRequest;
use App\Models\Park;

class ParkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(StoreParkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Park $park)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Park $park)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkRequest $request, Park $park)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Park $park)
    {
        //
    }
}
