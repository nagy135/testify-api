<?php

namespace App\Http\Controllers;

use App\Models\CClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CClass::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CClass  $cClass
     * @return \Illuminate\Http\Response
     */
    public function show(CClass $cClass)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CClass  $cClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CClass $cClass)
    {
        throw new \Exception('Not implemented');
    }
}
