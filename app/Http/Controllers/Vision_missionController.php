<?php

namespace App\Http\Controllers;

use App\Models\Vision_mission;
use Illuminate\Http\Request;

class Vision_missionController extends Controller
{
    public function vision_mission()
    {
        $visionmission = Vision_mission::all();
        return view('company_profile.vision_mission', compact('visionmission'));
    }

    public function addvision_mission(Request $request)
    {
        // Validasi data
        $request->validate([
            'vision' => 'required|string|max:1000',
            'mission' => 'required|string|max:1000',
        ]);

        // Simpan data ke database
        Vision_mission::create([
            'vision' => $request->vision,
            'mission' => $request->mission,
        ]);

        return redirect()->route('company_profile.vision_mission')->with('success', 'Vision & Mission berhasil ditambahkan!');
    }

    public function editvision_mission_action(Request $request, $id)
    {
        $request->validate([
            'vision' => 'string|max:1000',
            'mission' => 'string|max:1000',
        ]);

        $visionmission = Vision_mission::findOrFail($id);
        $visionmission->update([
            'vision' => $request->vision,
            'mission' => $request->mission,
        ]);

        return redirect()->route('company_profile.vision_mission')->with('success', 'Vision & Mission berhasil diperbarui!');
    }

    public function deletevision_mission($id)
    {
        $visionmission = Vision_mission::findOrFail($id);
        $visionmission->delete();

        return redirect()->route('company_profile.vision_mission')->with('success', 'Vision & Mission berhasil dihapus!');
    }
}