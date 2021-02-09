<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all(); 

        return response()->json($dishes, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = Dish::create([
            'name' => $request->name, 
            'image' => $request->image
        ]); 

        $dish->save(); 

        return response()->json($dish, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $dishUpdate = Dish::findOrFail($id);

            $request->validate([
                'name' => 'required', 
                'image' => 'required'
            ]);

            $dishUpdate->update($request->all());

            return response()->json($dishUpdate, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $dishToDelete = Dish::findOrFail($id, 'Dish not found');
            
            $dishToDelete->delete();
            return response()->json($dishToDelete, 204);

        } catch (\Exception $e) {

            return response()->json(['message' => 'dish not found!'], 404);
        }


    }
}
