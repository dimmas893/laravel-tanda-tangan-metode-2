<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{

    public function index()
    {
        return view('signature_pad');
    }

    public function store(Request $request)
    {

        $folderPath = public_path('images/');

        $image = explode(";base64,", $request->signed);

        $image_type = explode("image/", $image[0]);

        $image_type_png = $image_type[1];

        $image_base64 = base64_decode($image[1]);

        $file = $folderPath . uniqid() . '.' . $image_type_png;
        file_put_contents($file, $image_base64);
        return back()->with('success', 'Signature store successfully !!');
    }
}
