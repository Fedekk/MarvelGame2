<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
        $comic = new Comic();
        $input = $request->all();
        $comic->idMarvel = $input['idMarvel'];
        $comic->name = $input['name'];
        $comic->imgurl = $input['imgurl'];
        $comic->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        return $comic;
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
        $comic = Comic::find($id);
        $comic->idMarvel = $input['idMarvel'] != "" ? $input['idMarvel'] : $comic->idMarvel;
        $comic->name = $input['name'] != "" ? $input['name'] : $comic->name;
        $comic->imgurl = $input['imgurl'] != "" ? $input['imgurl'] : $comic->name;
        $comic->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comic = Comic::find($id);
        $comic->delete();
    }
}
