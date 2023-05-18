<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetDataController extends Controller
{
    public function index()
    {
        $data = DB::table('tabel')->get();

        return response()->json($data);
    }
}
