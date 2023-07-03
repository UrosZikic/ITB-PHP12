<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $id = 3;
        // $aModel = Person::find($id);
        // $aModel->name_en;
        // $aModel->name_sr;
        $data = Person::all();
        return view('person.index', ['data' => $data]);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(person $person)
    {
        //
    }
}