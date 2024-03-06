<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TicketController extends Controller
{
    public function index($id)
    {
        $tickets = Ticket::where('queue_id', $id)->get();
        return View::make('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function repair($id)
    {
        $queue_id = DB::table('tickets')->where('ticket_id', $id)->value('queue_id');
        $device = Ticket::where('ticket_id', $id)->update([
            'status' => 'repairing',
        ]);
        return redirect()->route('tickets.index', ['id' => $queue_id]);
    }

    public function finish($id)
    {
        $queue_id = DB::table('tickets')->where('ticket_id', $id)->value('queue_id');
        $device = Ticket::where('ticket_id', $id)->update([
            'status' => 'finished',
        ]);
        return redirect()->route('tickets.index', ['id' => $queue_id]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
