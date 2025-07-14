<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutus = About::all();
        return view('company_profile.index', compact('aboutus'));
    }

    public function addabout(Request $request)
    {
        // Validasi data
        $request->validate([
            'company' => 'required|string|max:255',
            'about_us' => 'required|string|max:1000',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:300',
        ]);

        // Simpan data ke database
        About::create([
            'company' => $request->company,
            'about_us' => $request->about_us,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('company_profile.index')->with('success', 'Company Profile berhasil ditambahkan!');
    }

    public function editabout_action(Request $request, $id)
    {
        $request->validate([
            'company' => 'string|max:255',
            'about_us' => 'string|max:1000',
            'email' => 'string|max:255',
            'address' => 'string|max:300',
        ]);

        $aboutus = About::findOrFail($id);
        $aboutus->update([
            'company' => $request->company,
            'about_us' => $request->about_us,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('company_profile.index')->with('success', 'Company Profile berhasil diperbarui!');
    }

    public function deleteabout($id)
    {
        $aboutus = About::findOrFail($id);
        $aboutus->delete();

        return redirect()->route('company_profile.index')->with('success', 'Company Profile berhasil dihapus!');
    }
}