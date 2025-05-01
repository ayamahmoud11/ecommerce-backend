<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        $this->authorize('viewAdminDashboard', User::class);

        return Inertia::render('Admin/Dashboard', [
            'productCount' => Product::count(),
            'orderCount' => Order::count(),
            'recentOrders' => Order::with('user')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}