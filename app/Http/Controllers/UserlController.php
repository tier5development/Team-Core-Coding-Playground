<?php

namespace App\Http\Controllers;

use App\Userl;
use Illuminate\Http\Request;

class UserlController extends Controller
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

         $this->validate(request(),[
            'username', 'email' 
            ]);         


        $userl= new Userl();
        $userl->username= $request['username'];
        $userl->email= $request['email'];
    // add other fields
    $userl->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userl  $userl
     * @return \Illuminate\Http\Response
     */
    public function show(Userl $userl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Userl  $userl
     * @return \Illuminate\Http\Response
     */
    public function edit(Userl $userl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Userl  $userl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userl $userl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Userl  $userl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userl $userl)
    {
        //
    }
}
