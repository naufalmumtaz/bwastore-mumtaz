<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();

        return view('pages.admin.dashboard', ['customer' => $customer, 'revenue' => $revenue, 'transaction' => $transaction]);
    }
}
