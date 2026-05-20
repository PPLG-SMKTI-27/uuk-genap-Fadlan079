<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\categorie;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    private function getDashboardData()
    {
        $totalProducts = product::count();
        $totalCategories = categorie::count();
        $totalTransactions = transaction::count();
        $totalRevenue = transaction::whereIn('status', ['completed', 'selesai'])->sum('total_price');
        $totalUsers = User::count();

        // Recent Transactions
        $recentTransactions = transaction::latest()->take(5)->get();

        // Low stock products warning
        $lowStockProducts = product::where('stock', '<', 10)->orderBy('stock', 'asc')->take(5)->get();

        // Last 7 days sales for chart
        $salesData = transaction::selectRaw('date, SUM(total_price) as total_sales')
            ->where('date', '>=', Carbon::now()->subDays(6)->toDateString())
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $chartLabels = [];
        $chartValues = [];
        for ($i = 6; $i >= 0; $i--) {
            $dateStr = Carbon::now()->subDays($i)->toDateString();
            $chartLabels[] = Carbon::parse($dateStr)->isoFormat('D MMM');
            
            $daySale = $salesData->firstWhere('date', $dateStr);
            $chartValues[] = $daySale ? (float) $daySale->total_sales : 0.0;
        }

        return [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalTransactions' => $totalTransactions,
            'totalRevenue' => $totalRevenue,
            'totalUsers' => $totalUsers,
            'recentTransactions' => $recentTransactions,
            'lowStockProducts' => $lowStockProducts,
            'chartLabels' => $chartLabels,
            'chartValues' => $chartValues,
        ];
    }

    public function adminDashboard()
    {
        $data = $this->getDashboardData();
        return view('admin.dashboard', $data);
    }

    public function petugasDashboard()
    {
        $data = $this->getDashboardData();
        return view('petugas.dashboard', $data);
    }
}
