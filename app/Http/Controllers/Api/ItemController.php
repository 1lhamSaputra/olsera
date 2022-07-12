<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Item::all();

        return response()->json([
            'msg'=>'succsess',
            'data'=>$item
        ]);
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
        //
        // $str_arr = preg_split ("/\,/", $request->pajak); 
        // print_r($str_arr); return;
        $validated = $request->validate([
            'nama' => 'required',
            'pajak' => 'required',
        ],[
            'nama.required'=>'nama tidak boleh kosong',
            'pajak.required'=>'pajak tidak boleh kosong',
        ]);

        $item = Item::insert($request->all());

        return response()->json([
            'msg'=>'succsess',
            'data'=>$request->all()
        ]);
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
        $item = Item::findOrFail($id);

        // $pajak = explode(',', $item->pajak);
        // print_r( new ItemResource($pajak));

        return response()->json([
            'msg'=>'succsess',
            'data'=>new ItemResource($item)
        ]);
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
        $validated = $request->validate([
            'nama' => 'required',
            'pajak' => 'required',
        ],[
            'nama.required'=>'nama tidak boleh kosong',
            'pajak.required'=>'pajak tidak boleh kosong',
        ]);

        $pajak = Pajak::findOrFail($id);
        $pajak->nama = $request->nama;
        $pajak->pajak = $request->pajak;
        $pajak->save();

        return response()->json([
            'msg'=>'succsess',
            'data'=>$pajak
        ]);
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
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json([
            'msg'=>'succsess',
            'data'=>$item
        ]);
    }
}
