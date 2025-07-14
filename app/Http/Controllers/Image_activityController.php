<?php

namespace App\Http\Controllers;

use App\Models\Image_activity;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Image_activityController extends Controller
{

    public function image_activity()
    {
        $images = DB::table('service')
            ->leftJoin('image_activity', 'image_activity.id_service', '=', 'service.id_service')
            ->select(
                'service.id_service',
                'service.category',
                'service.activity_photos',
                DB::raw('COUNT(image_activity.id_imageactivity) as total_gambar'),
                DB::raw('MAX(image_activity.activity_photosbac) as activity_photosbac')
            )
            ->groupBy('service.id_service', 'service.category', 'service.activity_photos')
            ->get();

        return view('service.image_activity', compact('images'));
    }

    public function addimage(Request $request)
    {
        $request->validate([
            'id_service' => 'required|exists:service,id_service',
            'activity_photosbac' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('activity_photosbac');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('activityphotos_bac'), $filename);

        Image_activity::create([
            'id_service' => $request->id_service,
            'activity_photosbac' => $filename,
        ]);

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function viewImages($id_service)
    {
        $service = Service::findOrFail($id_service);

        $images = Image_activity::where('id_service', $id_service)->get();

        return view('service.view_images', compact('service', 'images'));
    }

    public function deleteimageactivity($id_imageactivity)
    {
        $images = Image_activity::findOrFail($id_imageactivity);
        if ($images->activity_photosbac) {
            $oldPath = public_path('activityphotos_bac/' . $images->activity_photosbac);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $images->delete();

        return back()->with('success', 'Image berhasil dihapus.');
    }
}