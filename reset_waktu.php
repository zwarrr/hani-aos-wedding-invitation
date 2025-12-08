<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    // Reset semua waktu ke yang benar
    DB::statement("UPDATE ucapan SET created_at = '2025-12-08 15:24:48' WHERE id = 1");
    DB::statement("UPDATE ucapan SET created_at = '2025-12-08 17:18:11' WHERE id = 2");
    
    echo "✅ Reset waktu berhasil!\n\n";
    
    $data = DB::table('ucapan')->select('id', 'nama', 'created_at')->get();
    foreach ($data as $item) {
        echo "ID: {$item->id}, Nama: {$item->nama}, Waktu: {$item->created_at}\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
