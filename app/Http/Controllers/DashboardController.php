<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\SalesReportService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(SalesReportService $reportService)
    {
        $orders = $reportService->dashboardReport();

//        dd($orders);

        return $orders;
//        return view('dashboard',[
//            'summary' => $orders->bussinesSummary(),
//            'average_order_per_customer' => $orders->averageOrderByCustomer()
//        ]);
    }
}
