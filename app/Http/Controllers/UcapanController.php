<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UcapanController extends Controller
{
    /**
     * Get all ucapan with pagination
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 100); // Ubah dari 10 ke 100 untuk menampilkan lebih banyak
        $offset = ($page - 1) * $limit;

        try {
            // JANGAN set timezone - data sudah dalam WIB
            
            // Get total count
            $totalCount = DB::table('ucapan')->count();

            // Get ucapan data - LANGSUNG ambil data apa adanya
            $ucapan = DB::table('ucapan')
                ->select('id', 'nama', 'pesan', 'kehadiran', 'created_at')
                ->orderBy('created_at', 'desc')
                ->limit($limit)
                ->offset($offset)
                ->get()
                ->map(function($item) {
                    $createdTime = strtotime($item->created_at);
                    $now = time();
                    $diff = $now - $createdTime;
                    
                    // Jika kurang dari 1 menit
                    if ($diff < 60) {
                        $waktu = 'Baru saja';
                    }
                    // Jika kurang dari 1 jam (dalam menit)
                    elseif ($diff < 3600) {
                        $minutes = floor($diff / 60);
                        $waktu = $minutes . ' menit yang lalu';
                    }
                    // Jika kurang dari 24 jam (dalam jam)
                    elseif ($diff < 86400) {
                        $hours = floor($diff / 3600);
                        $waktu = $hours . ' jam yang lalu';
                    }
                    // Jika kurang dari 7 hari (dalam hari)
                    elseif ($diff < 604800) {
                        $days = floor($diff / 86400);
                        $waktu = $days . ' hari yang lalu';
                    }
                    // Jika lebih dari 7 hari, tampilkan tanggal lengkap
                    else {
                        $waktu = date('d/m/Y H:i', $createdTime);
                    }
                    
                    return [
                        'id' => $item->id,
                        'nama' => $item->nama,
                        'pesan' => $item->pesan,
                        'kehadiran' => $item->kehadiran,
                        'waktu' => $waktu,
                        'created_at' => $item->created_at
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $ucapan,
                'server_time' => date('Y-m-d H:i:s'), // Tambahkan waktu server
                'pagination' => [
                    'total' => $totalCount,
                    'page' => $page,
                    'limit' => $limit,
                    'totalPages' => ceil($totalCount / $limit)
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a new ucapan
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'pesan' => 'required|string',
            'kehadiran' => 'required|in:hadir,tidak_hadir,masih_ragu'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // JANGAN set timezone - data sudah dalam WIB
            
            $id = DB::table('ucapan')->insertGetId([
                'nama' => $request->nama,
                'pesan' => $request->pesan,
                'kehadiran' => $request->kehadiran,
                'created_at' => now(),
            ]);

            $ucapan = DB::table('ucapan')
                ->select('id', 'nama', 'pesan', 'kehadiran', 'created_at')
                ->where('id', $id)
                ->first();
            
            $createdTime = strtotime($ucapan->created_at);
            $now = time();
            $diff = $now - $createdTime;
            
            // Jika kurang dari 1 menit
            if ($diff < 60) {
                $waktu = 'Baru saja';
            }
            // Jika kurang dari 1 jam (dalam menit)
            elseif ($diff < 3600) {
                $minutes = floor($diff / 60);
                $waktu = $minutes . ' menit yang lalu';
            }
            // Jika kurang dari 24 jam (dalam jam)
            elseif ($diff < 86400) {
                $hours = floor($diff / 3600);
                $waktu = $hours . ' jam yang lalu';
            }
            // Jika kurang dari 7 hari (dalam hari)
            elseif ($diff < 604800) {
                $days = floor($diff / 86400);
                $waktu = $days . ' hari yang lalu';
            }
            // Jika lebih dari 7 hari, tampilkan tanggal lengkap
            else {
                $waktu = date('d/m/Y H:i', $createdTime);
            }

            return response()->json([
                'success' => true,
                'message' => 'Ucapan berhasil ditambahkan',
                'data' => [
                    'id' => $ucapan->id,
                    'nama' => $ucapan->nama,
                    'pesan' => $ucapan->pesan,
                    'kehadiran' => $ucapan->kehadiran,
                    'waktu' => $waktu,
                    'created_at' => $ucapan->created_at
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete an ucapan
     */
    public function destroy($id)
    {
        try {
            $deleted = DB::table('ucapan')->where('id', $id)->delete();

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Ucapan berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Ucapan tidak ditemukan'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete all ucapan
     */
    public function destroyAll()
    {
        try {
            DB::table('ucapan')->truncate();

            return response()->json([
                'success' => true,
                'message' => 'Semua ucapan berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete all data: ' . $e->getMessage()
            ], 500);
        }
    }
}
