<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\Bid;
use Auth;
use Session;
use App\User;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function about()
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
        $available = Order::where('status', '=', 'Available')->get();
        $count_available_orders = Order::where('status', '=', 'Available')->count();
       
        $pending = Order::where('order_status',  0)->where('status', '')->get();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();

        return view('about', ['pending'=>$pending, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'remaining'=>Session::get('remaining'),  'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);


    }

    public function services()
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
        $available = Order::where('status', '=', 'Available')->get();
        $count_available_orders = Order::where('status', '=', 'Available')->count();
       
        $pending = Order::where('order_status',  0)->where('status', '')->get();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();

        return view('services', ['pending'=>$pending, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'remaining'=>Session::get('remaining'),  'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
