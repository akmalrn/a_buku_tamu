<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use File;

class CleanUpFiles extends Command
{
    protected $signature = 'cleanup:files';
    protected $description = 'Clean up old files';

    public function handle()
    {
        // Tentukan path ke direktori file yang ingin dihapus
        $directory = storage_path('app/public/uploads');

        // Ambil semua file di direktori
        $files = Storage::allFiles($directory);

        foreach ($files as $file) {
            // Ambil waktu modifikasi file
            $lastModified = Storage::lastModified($file);

            // Hitung selisih waktu dengan sekarang
            $diffInHours = Carbon::now()->diffInHours(Carbon::createFromTimestamp($lastModified));

            // Hapus file jika lebih tua dari satu hari
            if ($diffInHours > 24) {
                Storage::delete($file);
                $this->info('File ' . $file . ' deleted successfully.');
            }
        }

        $this->info('Clean up completed.');
    }
}
