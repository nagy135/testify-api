<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * login user
     *
     * @return Response
     */
    public function login(){
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where([
            'email' => request('email')
        ])->firstOrFail();

        if ($user->password == request('password'))
            return response()->json([
                'status' => 'successful'
            ]);
        return response()->json([
            'status' => 'failed'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        throw new \Exception('Not implemented');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        throw new \Exception('Not implemented');
    }
