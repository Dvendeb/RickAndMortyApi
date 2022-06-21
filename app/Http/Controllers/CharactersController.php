<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Carbon\Exceptions\BadComparisonUnitException;
use Illuminate\Http\Request;

class CharactersController extends Controller
{

    public function index()
    {
       return Character::all();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $character=new Character;
        $character->name=$request->input('nombre');
        $character->status=$request->input('status');
        $character->specie=$request->input('especie');
        $character->gender=$request->input('genero');
        $character->origin=$request->input('originario');
        $character->save();
        return $character;
    }


    public function show($id)
    {
        return Character::findOrfail($id);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        $character=Character::findOrFail($id);
        $character->delete();

    }
}
