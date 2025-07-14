<?php

namespace App\Http\Controllers;

use App\Models\Superiority;
use Illuminate\Http\Request;

class SuperiorityController extends Controller
{
    public function index()
    {
        $superioritys = Superiority::all();
        return view('freecool_bac.index', compact('superioritys'));
    }

    public function addsuperiority(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'decryption' => 'required|string|max:1000',
            'image_superiority' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
    
        $attachmentFile = $request->file('image_superiority');
        $attachmentName = time() . 'image_superiority.' . $attachmentFile->getClientOriginalExtension();
        $attachmentFile->move(public_path('imagesuperiority'), $attachmentName);
    
        Superiority::create([
            'title' => $request->title,
            'decryption' => $request->decryption,
            'image_superiority' => $attachmentName,
        ]);
    
        return redirect()->route('freecool_bac.index')->with('success', 'Superiority berhasil ditambahkan!');
    }

    public function editsuperiority_action(Request $request, $id_superiority)
    {
        $request->validate([
            'title' => 'string|max:255',
            'decryption' => 'string|max:1000',
            'image_superiority' => 'file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $superioritys = Superiority::findOrFail($id_superiority);

        $attachmentName = $superioritys->image_superiority;
    
        if ($request->hasFile('image_superiority')) {
            $oldPath = public_path('imagesuperiority/' . $superioritys->image_superiority);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
    
            $attachmentFile = $request->file('image_superiority');
            $attachmentName = time() . 'image_superiority.' . $attachmentFile->getClientOriginalExtension();
            $attachmentFile->move(public_path('imagesuperiority'), $attachmentName);
        }

        $superioritys->update([
            'title' => $request->title,
            'decryption' => $request->decryption,
            'image_superiority' => $attachmentName,
        ]);

        return redirect()->route('freecool_bac.index')->with('success', 'Superiority berhasil diperbarui!');
    }

    public function deletesuperiority($id_superiority)
    {
        $superioritys = Superiority::findOrFail($id_superiority);
        if ($superioritys->image_superiority) {
            $oldPath = public_path('imagesuperiority/' . $superioritys->image_superiority);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
    
        $superioritys->delete();
    
        return redirect()->route('freecool_bac.index')->with('success', 'Superiority berhasil dihapus.');
    }
}