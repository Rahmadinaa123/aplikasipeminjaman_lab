<?php

namespace App\Http\Controllers;
use App\Models\inventarisLab;
use Illuminate\Http\Request;

class KalabInventarisLabController extends Controller
{
      //halaman Inventaris Lab
    public function index() {
        $data=inventarisLab::all();
        return view('Kalab.inventaris_Lab.Index', compact('data'));
   }
}