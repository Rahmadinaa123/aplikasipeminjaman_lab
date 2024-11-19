<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\inventarisLab;
use Illuminate\Http\Request;

class InventarisLabController extends Controller
{
     //halaman Inventaris Lab
    public function index() {
        $data=inventarisLab::all();
        return view('Laboran.inventaris_Lab.Index', compact('data'));
   }
   
    //halaman Inventaris lab
    public function addInventarisLab() {
        $users=User::all();
        return view('Laboran.inventaris_lab.tambahdata', compact('users'));
   }
}