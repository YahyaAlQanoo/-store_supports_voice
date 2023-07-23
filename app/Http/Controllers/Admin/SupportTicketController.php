<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSupportTicketRequest;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('tickets.index');

        $tickets = SupportTicket::orderByDesc('updated_at')->orderByDesc('created_at')->get();

        return view('Admin.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('tickets.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('tickets.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('tickets.view');

        $supportTicket = SupportTicket::findOrFail($id);
        return view('Admin.tickets.show', compact('supportTicket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('tickets.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupportTicketRequest $request, string $id)
    {
        Gate::authorize('tickets.update');

        $ticket = SupportTicket::find($id);
        $message = $ticket->messages()->create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
        ]);

        $ticket->touch();

        return redirect()->route('tickets.show',$id)->with('success', 'Ticket Message Send successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('tickets.delete');
    }
}
