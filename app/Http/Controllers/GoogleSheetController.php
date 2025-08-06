<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleSheetService;

class GoogleSheetController extends Controller
{
    public function sync(GoogleSheetService $googleSheet)
    {
        // Simpan ke database
        $googleSheet->saveToDatabase();

        // Ambil ulang dari DB setelah sinkronisasi
        $students = \App\Models\Student::all();

        // Kembalikan sebagai JSON untuk AJAX
        return response()->json($students);
    }
}

