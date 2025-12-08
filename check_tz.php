<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

// Cek timezone
$tz = DB::select("SELECT @@session.time_zone as session_tz, @@global.time_zone as global_tz, NOW() as now");
echo "MySQL Timezone:\n";
print_r($tz);

echo "\n\nData ucapan raw:\n";
$data = DB::select("SELECT id, nama, created_at FROM ucapan");
print_r($data);
