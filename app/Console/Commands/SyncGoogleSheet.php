<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoogleSheetService;

class SyncGoogleSheet extends Command
{
    protected $signature = 'sheet:sync';
    protected $description = 'Sync Google Sheet ke Database';

    public function handle(GoogleSheetService $sheetService)
    {
        $sheetService->saveToDatabase();
        $this->info('Data berhasil disinkronisasi.');
    }
}