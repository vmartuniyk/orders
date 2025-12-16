<?php

use App\Http\Controllers\DashboardController;
use App\Models\Order;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'dashboard'] );

Route::get('benchmark',function (){
   echo "Testing with " . Order::count() ."orders\n";
   echo "Hardware: M1 Mac Pro, Local Mysql\n\n";

   Benchmark::dd([
       'Complete Dashboard' => fn() =>
       app(\App\Services\SalesReportService::class)->dashboardReport('month'),

       'Just Top Customers' => fn() =>
       Order::completed()->forPeriod('month')->get()->topCustomers(),

       'Just Business Summary' => fn() =>
       Order::completed()->forPeriod('month')->get()->businessSummary(),

       'Just Daily Breakdowns' => fn() =>
       Order::completed()->forPeriod('month')->get()->dailyBreakdowns(),
   ],5);
});
