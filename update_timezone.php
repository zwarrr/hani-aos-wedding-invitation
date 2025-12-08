<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    // Cek data sebelum update
    $before = DB::table('ucapan')->select('id', 'nama', 'created_at')->get();
    echo "Data sebelum update:\n";
    foreach ($before as $item) {
        echo "ID: {$item->id}, Nama: {$item->nama}, Waktu: {$item->created_at}\n";
    }
    
    // Update: Tambah 7 jam untuk convert UTC ke WIB
    DB::statement("UPDATE ucapan SET created_at = DATE_ADD(created_at, INTERVAL 7 HOUR) WHERE created_at < '2025-12-08 10:00:00'");
    
    echo "\n✅ Berhasil update timezone!\n\n";
    
    // Cek data setelah update
    $after = DB::table('ucapan')->select('id', 'nama', 'created_at')->get();
    echo "Data setelah update:\n";
    foreach ($after as $item) {
        echo "ID: {$item->id}, Nama: {$item->nama}, Waktu: {$item->created_at}\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
