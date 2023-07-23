<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\SupportTicket;
use App\Http\Requests\StoreSupportTicketRequest;
use App\Http\Requests\UpdateSupportTicketRequest;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = SupportTicket::where('customer_id',Auth::id())->get();

        return view('Front.setting.tickets.index', compact('tickets'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupportTicketRequest $request)
    {
        $ticket = new SupportTicket();
        $ticket->customer_id = Auth::id();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->type = $request->type;
        $ticket->status = 'open';
        $ticket->priority = $request->priority ;
        $saved = $ticket->save();
        if($saved){
            $message = $ticket->messages()->create([
                'message' => $request->description,
                'user_id' => auth()->user()->id,
            ]);
        }



        return redirect()->route('front.tickets.index')->with('success', 'Ticket created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supportTicket = SupportTicket::findOrFail($id);
        return view('Front.setting.tickets.show', compact('supportTicket'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupportTicketRequest $request, string $id)
    {
        $ticket = SupportTicket::find($id);
        $message = $ticket->messages()->create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
        ]);
        $ticket->touch();


        return redirect()->route('front.tickets.index')->with('success', 'Ticket Message Send successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tickets = SupportTicket::findOrFail($id);
        $deleted = $tickets->delete();
        if($deleted) {
            return redirect()->route('front.tickets.index');
        }
    }
}
