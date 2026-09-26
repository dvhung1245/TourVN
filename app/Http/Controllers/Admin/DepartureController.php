<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departure;
use App\Models\Tour;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function index()
    {
        $departures = Departure::with('tour')->latest()->paginate(10);
        return view('admin.departures.index', compact('departures'));
    }

    public function create()
    {
        $tours = Tour::all();
        return view('admin.departures.create', compact('tours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_seats' => 'required|integer|min:1',
            'status' => 'required|in:Open,Closed,Cancelled',
        ]);

        Departure::create([
            'tour_id' => $request->tour_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_seats' => $request->total_seats,
            'available_seats' => $request->total_seats,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.departures.index')->with('success', 'Thêm lịch khởi hành thành công!');
    }

    public function edit(Departure $departure)
    {
        $tours = Tour::all();
        return view('admin.departures.edit', compact('departure', 'tours'));
    }

    public function update(Request $request, Departure $departure)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_seats' => 'required|integer|min:1',
            'status' => 'required|in:Open,Closed,Cancelled',
        ]);

        // Recalculate available seats (simplistic logic for MVP)
        $bookedSeats = $departure->total_seats - $departure->available_seats;
        $newAvailable = $request->total_seats - $bookedSeats;

        $departure->update([
            'tour_id' => $request->tour_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_seats' => $request->total_seats,
            'available_seats' => max(0, $newAvailable),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.departures.index')->with('success', 'Cập nhật lịch khởi hành thành công!');
    }

    public function destroy(Departure $departure)
    {
        $departure->delete();
        return redirect()->route('admin.departures.index')->with('success', 'Xóa lịch khởi hành thành công!');
    }
}
