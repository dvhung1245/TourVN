<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::with('category')->latest()->paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        $categories = TourCategory::all();
        return view('admin.tours.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:tour_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'price_adult' => 'required|numeric|min:0',
            'price_child' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255',
            'departure_location' => 'nullable|string|max:255',
            'transport' => 'nullable|string|max:255',
            'highlights' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:Draft,Published',
        ]);

        Tour::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'duration_days' => $request->duration_days,
            'duration_nights' => $request->duration_nights,
            'price_adult' => $request->price_adult,
            'price_child' => $request->price_child,
            'image' => $request->image,
            'departure_location' => $request->departure_location,
            'transport' => $request->transport,
            'highlights' => $request->highlights,
            'included' => $request->included,
            'excluded' => $request->excluded,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.tours.index')->with('success', 'Thêm tour thành công!');
    }

    public function edit(Tour $tour)
    {
        $categories = TourCategory::all();
        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'category_id' => 'required|exists:tour_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'price_adult' => 'required|numeric|min:0',
            'price_child' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255',
            'departure_location' => 'nullable|string|max:255',
            'transport' => 'nullable|string|max:255',
            'highlights' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:Draft,Published',
        ]);

        $tour->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'duration_days' => $request->duration_days,
            'duration_nights' => $request->duration_nights,
            'price_adult' => $request->price_adult,
            'price_child' => $request->price_child,
            'image' => $request->image,
            'departure_location' => $request->departure_location,
            'transport' => $request->transport,
            'highlights' => $request->highlights,
            'included' => $request->included,
            'excluded' => $request->excluded,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.tours.index')->with('success', 'Cập nhật tour thành công!');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('admin.tours.index')->with('success', 'Xóa tour thành công!');
    }
}
