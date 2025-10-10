<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function purchase(Request $request, $eventId)
    {
        $user = $request->user();
        $request->validate(['quantity' => 'required|integer|min:1']);
        $quantity = $request->input('quantity');

        $event = Event::findOrFail($eventId);

        if ($event->availableQuota() < $quantity) {
            return response()->json(['message' => 'Kuota tidak cukup'], 422);
        }

        $amount = $event->price * $quantity;

        $ticketCode = strtoupper(Str::random(10));
        $ticket = Ticket::create([
            'ticket_code' => $ticketCode,
            'user_id' => $user->id,
            'event_id' => $event->id,
            'quantity' => $quantity,
            'amount' => $amount,
            'status' => 'paid',
        ]);

        $event->increment('sold', $quantity);

        $qrData = route('tickets.validate', ['code' => $ticketCode]);
        $fileName = 'qr_'.$ticket->id.'.png';
        $path = storage_path('app/public/qr/'.$fileName);
        QrCode::format('png')->size(300)->generate($qrData, $path);

        $ticket->qr_path = 'storage/qr/'.$fileName;
        $ticket->save();

        return response()->json([
            'ticket' => $ticket,
            'message' => 'Pembelian sukses, e-ticket telah diterbitkan.',
            'qr_url' => asset($ticket->qr_path)
        ], 201);
    }

    public function myTickets(Request $request)
    {
        $user = $request->user();
        return response()->json($user->tickets()->with('event')->get());
    }

    public function validateTicket(Request $request, $code)
    {
        $ticket = Ticket::where('ticket_code', $code)->first();
        if (!$ticket) {
            return response()->json(['valid' => false, 'message' => 'Ticket tidak ditemukan'], 404);
        }
        return response()->json(['valid' => true, 'ticket' => $ticket]);
    }
}
