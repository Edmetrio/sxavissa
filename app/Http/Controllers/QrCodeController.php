<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Generator;

class QrCodeController extends Controller
{
    public function index()
    {
        $qrcode = new Generator;
        $data = $qrcode->size(250)
                        ->format('png')
                        ->color(255,0,0)
                        ->generate('https://firsteducation.edu.mz/');

        return view('qrCode', compact('data'));
    }
}
