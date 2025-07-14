<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Client;
use App\Models\Image_activity;
use App\Models\Product;
use App\Models\Service;
use App\Models\Superiority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Web_bacController extends Controller
{
    public function index()
    {
        $superioritys = Superiority::all();
        $aboutus = About::all();
        $services = Service::all();
        $clients = Client::all();
        $products = Product::all();

        $images = DB::table('service')
            ->leftJoin('image_activity', 'image_activity.id_service', '=', 'service.id_service')
            ->select(
                'service.id_service',
                'service.category',
                'service.decryption',
                'service.activity_photos',
                DB::raw('COUNT(image_activity.id_imageactivity) as total_gambar'),
                DB::raw('MAX(image_activity.activity_photosbac) as activity_photosbac')
            )
            ->groupBy('service.id_service', 'service.category', 'service.decryption', 'service.activity_photos')
            ->get();

        return view('welcome', compact('superioritys', 'aboutus', 'services', 'clients', 'images', 'products'));
    }

    public function detail_service(Request $request)
    {

        $id_service = $request->query('id');


        if (!$id_service) {
            abort(404, 'ID Service tidak ditemukan');
        }

        $about = About::first();

        $service = Service::findOrFail($id_service);

        $images = Image_activity::where('id_service', $id_service)->get();

        return view('detail_service', compact('about', 'service', 'images'));
    }

    public function detail_product(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            abort(404, 'Product not found');
        }

        $about = About::first();

        $product = Product::findOrFail($id);

        return view('detail_product', compact('about', 'product'));
    }
}
