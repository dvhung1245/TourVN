<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourCategoryController extends Controller
{
    public function index()
    {
        $categories = TourCategory::latest()->paginate(10);
        return view('admin.tour_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.tour_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        TourCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.tour_categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit(TourCategory $tourCategory)
    {
        return view('admin.tour_categories.edit', compact('tourCategory'));
    }

    public function update(Request $request, TourCategory $tourCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $tourCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.tour_categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(TourCategory $tourCategory)
    {
        $tourCategory->delete();
        return redirect()->route('admin.tour_categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}
