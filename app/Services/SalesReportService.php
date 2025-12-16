<?php

namespace App\Services;

use App\Models\Order;

class SalesReportService
{
    public function dashboardReport(string $period = 'month'): array
    {
        $orders = Order::completed()
                ->forPeriod($period)
                ->with('items.product')
                ->get();

        return [
            'summary' => $orders->bussinesSummary(),
            'average_order_per_customer' => $orders->averageOrderByCustomer(),
            'top_customers' => $orders->topCustomers(),
            'daily_breakdowns' =>$orders->dailyBreakdowns()
        ];
    }
}
