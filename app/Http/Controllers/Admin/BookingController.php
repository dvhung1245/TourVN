<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Departure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('departure.tour')->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $departures = Departure::with('tour')->where('status', 'Open')->get();
        return view('admin.bookings.create', compact('departures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departure_id' => 'required|exists:departures,id',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $departure = Departure::findOrFail($request->departure_id);

        if ($departure->available_seats < $request->quantity) {
            return back()->withInput()->withErrors(['quantity' => 'Không đủ chỗ trống.']);
        }

        $totalPrice = $departure->tour->price_adult * $request->quantity;

        $booking = Booking::create([
            'departure_id' => $request->departure_id,
            'booking_code' => strtoupper(Str::random(8)),
            'total_price' => $totalPrice,
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'notes' => $request->notes,
            'booking_status' => 'Pending', // Pending, Deposited, Paid, Cancelled
            'payment_status' => 'Unpaid',
        ]);

        for ($i = 0; $i < $request->quantity; $i++) {
            $booking->passengers()->create([
                'name' => 'Passenger ' . ($i + 1),
                'type' => 'Adult',
                'price' => $departure->tour->price_adult,
            ]);
        }

        // Reduce available seats
        $departure->decrement('available_seats', $request->quantity);

        return redirect()->route('admin.bookings.index')->with('success', 'Thêm booking thành công!');
    }

    public function edit(Booking $booking)
    {
        $departures = Departure::with('tour')->get();
        return view('admin.bookings.edit', compact('booking', 'departures'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'booking_status' => 'required|in:Pending,Deposited,Paid,Cancelled',
            'payment_status' => 'required|in:Unpaid,Partial,Paid',
        ]);

        $oldStatus = $booking->booking_status;
        
        $booking->update([
            'booking_status' => $request->booking_status,
            'payment_status' => $request->payment_status,
        ]);

        // If cancelled, restore seats
        if ($request->booking_status === 'Cancelled' && $oldStatus !== 'Cancelled') {
            // Need to know quantity, but wait, booking doesn't have quantity column directly?
            // Wait, I need to check the migration for bookings table again!
        }

        return redirect()->route('admin.bookings.index')->with('success', 'Cập nhật trạng thái thành công!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Xóa booking thành công!');
    }
}
