<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['PageTitle'] = 'Dashboard';
        $data['totalOrder'] = Order::all()->count();
        $data['totalNewAddedOrder'] = Order::where('created_at', '>', Carbon::now()->subDays(7)->startOfDay())->count();
        // dd(  $data['totalNewAddedOrder']);
        $data['recent_orders']= Order::orderby('created_at','desc')->take(7)->get();

        $data['recent_products']= Product::orderby('created_at','desc')->take(7)->get();

        $data['recent_users']= User::orderby('created_at','desc')->take(7)->get();

        $data['days'] = "";
        $data['sales'] = "";
        for($i = 0; $i < 30; $i++) {
            $data['days'] .= "'".date("d M", strtotime('-'. $i .' days'))."',";

            $data['sales'] .=  "'".Order::where('status','=','completed')->whereDate('created_at', '=', date("Y-m-d", strtotime('-'. $i .' days')))->count()."',";
        }
        return view('admin.dashboard', $data);
    }
}
