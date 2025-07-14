<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function client()
    {
        $clients = Client::all();
        return view('freecool_bac.client', compact('clients'));
    }

    public function addclient(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'address_client' => 'required|string|max:1000',
            'client_logo' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
    
        $attachmentFile = $request->file('client_logo');
        $attachmentName = time() . 'client_logo.' . $attachmentFile->getClientOriginalExtension();
        $attachmentFile->move(public_path('logo_client'), $attachmentName);
    
        Client::create([
            'client_name' => $request->client_name,
            'address_client' => $request->address_client,
            'client_logo' => $attachmentName,
        ]);
    
        return redirect()->route('freecool_bac.client')->with('success', 'Client berhasil ditambahkan!');
    }

    public function editclient_action(Request $request, $id_client)
    {
        $request->validate([
            'client_name' => 'string|max:255',
            'address_client' => 'string|max:1000',
            'client_logo' => 'file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $clients = Client::findOrFail($id_client);

        $attachmentName = $clients->client_logo;
    
        if ($request->hasFile('client_logo')) {
            $oldPath = public_path('logo_client/' . $clients->client_logo);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
    
            $attachmentFile = $request->file('client_logo');
            $attachmentName = time() . 'client_logo.' . $attachmentFile->getClientOriginalExtension();
            $attachmentFile->move(public_path('logo_client'), $attachmentName);
        }

        $clients->update([
            'client_name' => $request->client_name,
            'address_client' => $request->address_client,
            'client_logo' => $attachmentName,
        ]);

        return redirect()->route('freecool_bac.client')->with('success', 'Client berhasil diperbarui!');
    }

    public function deleteclient($id_client)
    {
        $clients = Client::findOrFail($id_client);
        if ($clients->client_logo) {
            $oldPath = public_path('logo_client/' . $clients->client_logo);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
    
        $clients->delete();
    
        return redirect()->route('freecool_bac.client')->with('success', 'Client berhasil dihapus.');
    }
}