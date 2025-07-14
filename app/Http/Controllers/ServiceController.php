<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    public function addservice(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'decryption' => 'required|string|max:1000',
            'address' => 'required|string|max:300',
            'activity_date' => 'required',
            'activity_photos' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
    
        $attachmentFile = $request->file('activity_photos');
        $attachmentName = time() . '_activity_photos.' . $attachmentFile->getClientOriginalExtension();
        $attachmentFile->move(public_path('activityphotos_bac'), $attachmentName);
    
        Service::create([
            'category' => $request->category,
            'decryption' => $request->decryption,
            'address' => $request->address,
            'activity_date' => $request->activity_date,
            'activity_photos' => $attachmentName,
        ]);
    
        return redirect()->route('service.index')->with('success', 'Service berhasil ditambahkan!');
    }

    public function editservice_action(Request $request, $id_service)
    {
        $request->validate([
            'category' => 'string|max:255',
            'decryption' => 'string|max:1000',
            'address' => 'string|max:300',
            'activity_photos' => 'file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $services = Service::findOrFail($id_service);

        $attachmentName = $services->activity_photos;
    
        if ($request->hasFile('activity_photos')) {
            $oldPath = public_path('activityphotos_bac/' . $services->activity_photos);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
    
            $attachmentFile = $request->file('activity_photos');
            $attachmentName = time() . 'activity_photos.' . $attachmentFile->getClientOriginalExtension();
            $attachmentFile->move(public_path('activityphotos_bac'), $attachmentName);
        }

        $services->update([
            'category' => $request->category,
            'decryption' => $request->decryption,
            'address' => $request->address,
            'activity_date' => $request->activity_date,
            'activity_photos' => $attachmentName,
        ]);

        return redirect()->route('service.index')->with('success', 'Service berhasil diperbarui!');
    }

    public function deleteservice($id)
    {
        $services = Service::findOrFail($id);
        if ($services->activity_photos) {
            $oldPath = public_path('activityphotos_bac/' . $services->activity_photos);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
    
        $services->delete();
    
        return redirect()->route('service.index')->with('success', 'Service berhasil dihapus.');
    }
}