<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TraitementController extends Controller
{

    public function index() {
        return view('traitement.index');
    }

    public function create() {

        return view('traitement.create');
    }
}
