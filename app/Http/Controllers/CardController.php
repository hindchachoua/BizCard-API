<?php

namespace App\Http\Controllers;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Card::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'address' => 'required',
            'user_id' => 'required',
        ]);

        return Card::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Card::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $card = Card::find($id);
        $card->update($request->all());
        return $card;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Card::destroy($id);
    }
}
