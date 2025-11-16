<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DashboardContent;
use Illuminate\Http\Request;

class DashboardContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = DashboardContent::orderBy('type')
                                  ->orderBy('order')
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(15);
        
        return view('admin.dashboard-content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard-content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:news,announcement,achievement,tip,event',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
            'expires_at' => 'nullable|date|after:now'
        ]);

        DashboardContent::create($request->all());

        return redirect()->route('admin.dashboard-content.index')
                        ->with('success', 'Konten dashboard berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardContent $dashboardContent)
    {
        return view('admin.dashboard-content.show', compact('dashboardContent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardContent $dashboardContent)
    {
        return view('admin.dashboard-content.edit', compact('dashboardContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardContent $dashboardContent)
    {
        $request->validate([
            'type' => 'required|in:news,announcement,achievement,tip,event',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
            'expires_at' => 'nullable|date|after:now'
        ]);

        $dashboardContent->update($request->all());

        return redirect()->route('admin.dashboard-content.index')
                        ->with('success', 'Konten dashboard berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardContent $dashboardContent)
    {
        $dashboardContent->delete();

        return redirect()->route('admin.dashboard-content.index')
                        ->with('success', 'Konten dashboard berhasil dihapus!');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(DashboardContent $dashboardContent)
    {
        $dashboardContent->update([
            'is_active' => !$dashboardContent->is_active
        ]);

        return redirect()->back()
                        ->with('success', 'Status konten berhasil diubah!');
    }
}
