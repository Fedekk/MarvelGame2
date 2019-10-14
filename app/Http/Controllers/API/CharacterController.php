<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Character;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chars = Character::all()->toArray();
        return view('personaggi')
        ->with('chars', $chars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $char = new Character();
        $char->idMarvel = $input['idMarvel'];
        $char->name = $input['name'];
        $char->imgurl = $input['imgurl'];
        $char->save();
        return 'salvato';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $char = Character::find($id);
        return $char;
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
        //
        $input = $request->all();
        $char = Character::find($id);
        $char->idMarvel = $input['idMarvel'] != "" ? $input['idMarvel'] : $char->idMarvel;
        $char->name = $input['name'] != "" ? $input['name'] : $char->name;
        $char->imgurl = $input['imgurl'] != "" ? $input['imgurl'] : $char->imgurl;
        $char->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $char = Character::find($id);
        $char->delete();
    }
}
