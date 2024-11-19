<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class KalabController extends Controller
{
    
    public function index() {
        return view('Kalab.Index');
   }
    public function profil() {
        $data=User::all();
        return view('Kalab.profil', compact('data'));
   }
    
   }