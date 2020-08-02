<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        $data = DB::table('hospedagens')->first();
        dd($data->data_entrada);
    }
}
