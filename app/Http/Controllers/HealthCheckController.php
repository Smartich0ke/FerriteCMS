<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HealthCheckController extends Controller
{
    public function readiness()
    {
        try {
            // Check database connection
            DB::connection()->getPdo();
            // Add more checks if necessary

            return response()->json(['status' => 'ok'], 200);
        } catch (\Exception $e) {
            Log::error('Readiness check failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    public function liveness()
    {
        // Simple check to confirm the app is alive
        return response()->json(['status' => 'alive'], 200);
    }
}
