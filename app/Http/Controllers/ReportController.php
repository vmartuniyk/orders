<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\SalesReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dashboard(Request $request,SalesReportService $reportService)
    {
        $period = $request->input('period','month');

       return response()->json($reportService->dashboard($period));
    }
}
