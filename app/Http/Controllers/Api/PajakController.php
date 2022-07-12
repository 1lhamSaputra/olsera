<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pajak = Pajak::all();

        return response()->json([
            'msg'=>'succsess',
            'data'=>$pajak
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
        $validated = $request->validate([
            'nama' => 'required',
            'rate' => 'required',
        ],[
            'nama.required'=>'nama tidak boleh kosong',
            'rate.required'=>'rate tidak boleh kosong'
        ]);

        $pajak = Pajak::insert($request->all());

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
        $pajak = Pajak::findOrFail($id);

        return response()->json([
            'msg'=>'succsess',
            'data'=>$pajak
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
        $validated = $request->validate([
            'nama' => 'required',
            'rate' => 'required',
        ],[
            'nama.required'=>'nama tidak boleh kosong',
            'rate.required'=>'rate tidak boleh kosong'
        ]);

        $pajak = Pajak::findOrFail($id);
        $pajak->nama = $request->nama;
        $pajak->rate = $request->rate;
        $pajak->save();

        return response()->json([
            'msg'=>'succsess',
            'data'=>$pajak
        ]);

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
        $pajak = Pajak::findOrFail($id);
        $pajak->delete();

        return response()->json([
            'msg'=>'succsess',
            'data'=>$pajak
        ]);
    }
}
