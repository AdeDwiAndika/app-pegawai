<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->paginate(10);
        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'expires_at' => 'nullable|date',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'expires_at' => $request->expires_at,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Pengumuman berhasil dibuat!');
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'expires_at' => 'nullable|date',
        ]);

        $announcement->update($request->only(['title', 'content', 'expires_at']));

        return redirect()->route('announcements.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Pengumuman berhasil dihapus!');
    }
}
