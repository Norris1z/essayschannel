<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Order;
use App\Bid;
use Auth;
use Session;
use App\User;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orders = DB::table('orders')->select('orders.id', 'user_id', 'orders.citation', 'orders.created_at', 'doctype', 'order_title', 'order_level', 'spacing', 'discipline', 'deadline', 'client_price', 'no_of_sources', 'instructions', 'no_of_pages')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->where('status', '=', 'Paid')
        ->get();

        $myorders = DB::table('orders')->select('orders.id', 'user_id', 'orders.citation', 'orders.created_at', 'doctype', 'order_title', 'order_level', 'spacing', 'discipline', 'deadline', 'client_price', 'no_of_sources', 'instructions', 'no_of_pages')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('client_id', Auth::user()->id)
        ->where('status', '=', 'Paid')
        ->get();
        // dd($myorders);

            $count_rejected = DB::table('orders')
            ->where('status', '=', 'Rejected')
            ->count();
            $count_approved = DB::table('orders')
            ->where('status', '=', 'Approved')
            ->count();
            $count_completed = DB::table('orders')
            ->where('status', '=', 'Completed')
            ->count();
            $count_assigned_but_unconfirmed = DB::table('orders')
            ->where('status', '=', 'Unconfirmed')
            ->count();
            $count_revision = DB::table('orders')
            ->where('status', '=', 'Revision')
            ->count();
            $count_editing = DB::table('orders')
            ->where('status', '=', 'Editing')
            ->count();
        $count_all_orders = DB::table('orders')->count();
        $available = Order::where('status', '=', 'Paid')->get();
        $count_available_orders = Order::where('status', '=', 'Paid')->count();
       
        $pending = Order::where('order_status',  0)->where('status', '')->get();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();

        return view('home', ['orders'=>$orders, 'myorders'=>$myorders, 'pending'=>$pending, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'remaining'=>Session::get('remaining'),  'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);


    }

    

    public function profile()
    {
            $count_rejected = DB::table('orders')
            ->where('status', '=', 'Rejected')
            ->count();
            $count_approved = DB::table('orders')
            ->where('status', '=', 'Approved')
            ->count();
            $count_completed = DB::table('orders')
            ->where('status', '=', 'Completed')
            ->count();
            $count_revision = DB::table('orders')
            ->where('status', '=', 'Revision')
            ->count();
            $count_editing = DB::table('orders')
            ->where('status', '=', 'Editing')
            ->count();
        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Paid')->count();

        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
      
        $viewuser = DB::table('users')->where('id', Auth::user()->id)
        ->first();
        //dd($viewuser);

        return view('profile', ['viewuser'=>$viewuser, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'remaining'=>Session::get('remaining'), 'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);
    }
}