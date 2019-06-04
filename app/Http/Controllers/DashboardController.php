<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\UserChart;
use App\User;

class DashboardController extends Controller
{
    public function index(){

    	$users = User::whereNull('admin')->count();

    	$chart = new UserChart;
    	$chart->labels(['One', 'Two', 'Three']);
    	$chart->dataset('My dataset 1', 'line', [1, 2, 3]);

    	return view('admin.dashboard.dashboard', compact('users', 'chart'));



    }
}
