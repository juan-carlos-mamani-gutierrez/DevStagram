<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ImagenController extends Controller
{
    
    public function store( Request $request)
    {
        $imagen = $request->file('file');
        $manager = new ImageManager(new Driver());
        
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $imagenServidor = $manager::imagick()->read($imagen);
        $imagenServidor->resizeDown(1000,1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
        
    }
}
