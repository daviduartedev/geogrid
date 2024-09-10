<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = Point::all();

        return view('welcome', compact('points'));
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
        $request->validate([
            'description' => ['required','min:3'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        $newPoint = Point::create($request->only(['description', 'latitude', 'longitude'])); 

        return response()->json([
            'message' => 'Ponto salvo com sucesso!',
            'point' => $newPoint 
        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $point = Point::findOrFail($id);
    
        $point->delete();
    
        return response()->json([
            'message' => 'Ponto excluído com sucesso!',
            'point' => $point 
        ]); 
    }
}
