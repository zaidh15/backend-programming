<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["Gajah", "Ular", "Jerapah"];
    
    public function index()
    {
        return response()->json($this->animals);
    }

    public function store(Request $request)
    {
        array_push($this->animals, $request->nama);
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $this->animals[$id] = $request->nama;
        return $this->index();
    }

    public function destroy($id)
    {
        unset($this->animals[$id]);
        return $this->index();
    }
}
