<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    echo "Waktu sekarang server: " . date('Y-m-d H:i:s') . " WIB\n\n";
    
    // Cek data sekarang
    $data = DB::table('ucapan')->select('id', 'nama', 'created_at')->get();
    echo "Data ucapan saat ini:\n";
    foreach ($data as $item) {
        echo "ID: {$item->id}, Nama: {$item->nama}, Waktu DB: {$item->created_at}\n";
    }
    
    // Hitung selisih waktu untuk debugging
    echo "\nHitung selisih dari sekarang:\n";
    foreach ($data as $item) {
        $now = new DateTime();
        $past = new DateTime($item->created_at);
        $diff = $now->diff($past);
        
        if ($diff->y > 0) echo "ID {$item->id}: {$diff->y} tahun yang lalu\n";
        elseif ($diff->m > 0) echo "ID {$item->id}: {$diff->m} bulan yang lalu\n";
        elseif ($diff->d > 0) echo "ID {$item->id}: {$diff->d} hari yang lalu\n";
        elseif ($diff->h > 0) echo "ID {$item->id}: {$diff->h} jam yang lalu\n";
        elseif ($diff->i > 0) echo "ID {$item->id}: {$diff->i} menit yang lalu\n";
        else echo "ID {$item->id}: Baru saja\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
