<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    /*public function upload()
    {
        return view('products.upload');
    }*/

    public function upload()
    {
        $file = \Input::file('kml');

        var_dump($file);
        var_dump(\Input::hasFile('kml'));

        $destinationPath = public_path().DIRECTORY_SEPARATOR.'temp';
        $fileName = rand(11111, 99999);

        var_dump($file->move($destinationPath, $fileName));

        return redirect('/');
    }
}