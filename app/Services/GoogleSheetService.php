<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;

class GoogleSheetService
{
    protected $sheet;

    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google/just-do-it-468203-dc2789dfbade.json'));
        $client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);

        $this->sheet = new Google_Service_Sheets($client);
    }

    public function readSheet()
    {
        // Ambil nilai dari .env
        $spreadsheetId = env('GOOGLE_SHEET_ID');
        $range = env('GOOGLE_SHEET_RANGE');

        $response = $this->sheet->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }
}
