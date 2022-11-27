<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tickets;
use App\Models\SupportType;
use Illuminate\Http\Request;
use App\Models\TicketDescription;
use App\Models\Documents;

use PDF;

class TicketsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = Tickets::with('ticket_user')->with('ticket_support_type')->orderBy('id', 'ASC')->paginate(10)->withQueryString();
        $type_support = SupportType::where('status', '1')->get();
        return view('pages.ticketSoporte', [
            'tickets'  => $ticket,
            'supports' => $type_support
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTikets($id)
    {
        $tiket = Tickets::with('tickets_description')->where('id', $id)->orderBy('id', 'ASC')->first();

        return view(
            'pages.tickets-desciption',
            ['descripcions' => $tiket->tickets_description, "ticket" => $tiket],

        );
    }

    public function storeDescription(Request $request, TicketDescription $ticketDescription)
    {

        try {
            $ticketDescription->description = $request->description;
            $ticketDescription->ticket_id  = $request->id_ticket;
            $ticketDescription->id_creator = $request->id_user;

            if ($ticketDescription->save()) {
                return redirect('/seguimiento.soporte/' . $request->id_ticket);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tickets $ticket, TicketDescription $description, Documents $document)
    {

        try {
            $ticket->name       = $request->name;
            $ticket->id_creator = $request->id_user;
            $ticket->id_type    = $request->type_support;
            $ticket->status     = $request->status;

            if ($ticket->save()) {
                $description->description = $request->description;
                $description->id_creator  = $request->id_user;
                $description->ticket_id   = $ticket->id;
                $description->save();

                $document->name = $request->file('documento')->store('public');
                $document->type = $request->file('documento')->getMimeType();
                $document->ticket_id = $description->ticket_id;
                $document->save();
            }

            response()->json($ticket, 200);
        } catch (\Exception $e) {
            return " Error: " . $e->getMessage();
        }
        return redirect('/soporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function showPdf($id)
    {
        $tiket = Tickets::with('tickets_description')->where('id', $id)->orderBy('id', 'ASC')->first();
        $user  = User::where('id', $tiket->id_creator)->first();
        $pdf = PDF::loadView(
            'pages.seguimiento-pdf',
            [
                'descripcions' => $tiket->tickets_description,
                'ticket' => $tiket,
                'user' => $user
            ]
        )->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('ticket-pdf-' . $tiket->id . $tiket->created_at . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function listDocuments($id)
    {
        $documentos = Documents::where('ticket_id', $id)->get();
        return view('pages.list-documents', ['documentos' => $documentos]);
    }

    public function storeDocument(Request $request, Documents $document)
    {
        try {

            $document->name = $request->file('cargar_documento')->store('public');
            $document->type = $request->file('cargar_documento')->getMimeType();
            $document->ticket_id = $request->id_ticket;
            $document->save();
            return redirect('/soporte');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Tickets $tickets)
    {
        $verify = Tickets::where('id', $id)->orWhere('status', 'abierto')->exists();
        if ($verify) {
            Tickets::where('id', $id)->update(['status' => 'cerrado']);
        }

        return redirect('/soporte');
    }
}
