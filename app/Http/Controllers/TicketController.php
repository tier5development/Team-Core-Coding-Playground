<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $ticket = Ticket::all();
    return view('Ticket.view_tickets')->with('ticket', $ticket);
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
 		 	'name' => 'required|unique:tickets',
 		 	'sex' => 'required',
 		 	'contact' => 'required',
 		 	'email' => 'required'
            ]);  

 		$ticket = new Ticket();
        $ticket->name = $request['name'];
        $ticket->sex= $request['sex'];
        $ticket->contact = $request['contact'];
        $ticket->email = $request['email'];
        $ticket->save();
        return redirect('/ticket');

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


    public function ticket_counter()
    {
    	return view('Ticket.ticket_form');
    }


    public function search()
    {
    	return view('Ticket.search');
    }


    public function find()
    {
    	$ticket = Ticket::all();
    	return view('Ticket.show_contact')->with('ticket', $ticket);

    }
}
