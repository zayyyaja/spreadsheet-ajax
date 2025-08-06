<?php

namespace App\Http\Controllers;

use App\Services\GoogleSheetService;

class SheetController extends Controller
{
    public function index(GoogleSheetService $sheetService)
    {
        $data = $sheetService->readSheet();

        return view('sheet', ['data' => $data]);
    }
}
