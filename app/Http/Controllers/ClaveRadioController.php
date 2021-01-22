<?php

namespace App\Http\Controllers;

use App\Models\ClaveRadio;
use Illuminate\Http\Request;


class ClaveRadioController extends Controller
{
    public function index(){
        $dataRadio = collect(DB::table('clave_radio'));
    }


}
