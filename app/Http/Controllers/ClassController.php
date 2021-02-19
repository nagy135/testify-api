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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CClass  $cClass
     * @return \Illuminate\Http\Response
     */
    public function show(CClass $cClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CClass  $cClass
     * @return \Illuminate\Http\Response
     */
    public function edit(CClass $cClass)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CClass  $cClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(CClass $cClass)
    {
        //
    }
}
