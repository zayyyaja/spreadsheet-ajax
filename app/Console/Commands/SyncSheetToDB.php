<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contact;
use App\Services\GoogleSheetService;

class SyncSheetToDB extends Command
{
    protected $signature = 'sync:sheet';
    protected $description = 'Sync data from Google Sheet to database';

    public function handle(GoogleSheetService $sheetService)
    {
        $rows = $sheetService->readSheet();

        foreach ($rows as $index => $row) {
            // Lewati header (baris pertama)
            if ($index === 0) continue;

            // Pastikan data lengkap
            if (isset($row[0]) && isset($row[1])) {
                Contact::updateOrCreate(
                    ['email' => $row[1]],
                    ['name' => $row[0]]
                );
            }
        }

        $this->info('Data berhasil disinkron dari Spreadsheet.');
    }
}
