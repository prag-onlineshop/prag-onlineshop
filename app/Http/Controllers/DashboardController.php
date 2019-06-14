<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\UserChart;
use App\User;
use App\Carts;
use App\Product;
class DashboardController extends Controller
{
    public function index(){

    	$users = User::whereNull('admin')->count();
    	$orders = Carts::where('status', 'pending')->count();
    	$products = Product::whereDate('created_at', '=', date('Y-m-d'))->get()->count();

        //$userEdit = User::find($user)->firstOrFail();

    	$usersList = User::all();

    	$chart = new UserChart;
    	$chart->labels(['One', 'Two', 'Three']);
    	$chart->dataset('My dataset 1', 'line', [1, 2, 3]);

    	return view('admin.dashboard.dashboard', compact('users', 'orders', 'chart', 'products', 'usersList', 'userEdit'));

    }

    public function update(){
        dd('test');

        $filterUser = User::where('id', $user)->firstOrFail();

        dd($filterUser);
    }

}
