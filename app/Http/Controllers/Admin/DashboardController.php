<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.admin-dashboard', [
            'totalEvents' => \App\Models\Event::count(),
            'totalBookings' => \App\Models\Booking::count(),
            'activeUsers'=> \App\Models\User::where('is_active', true)->count(),
            'recentBookings'=> \App\Models\Booking::with('user', 'event')
                                ->latest()
                                ->take(5)
                                ->get(),
        ]);
    }
}
