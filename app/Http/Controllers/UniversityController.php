<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = University::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new University();
        $data->name=$request->name;
        $data->address=$request->address;
        $data->telephone=$request->telephone;
        $data->save();
        return "created";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = University::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = University::find($id);
        $data->name=$request->name;
        $data->address=$request->address;
        $data->telephone=$request->telephone;
        $data->save();
        return "updated";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = University::find($id);
        $data->delete();
        return "deleted";
    }
}
