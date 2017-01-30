<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Order;
use Redirect;
use Validator;
use Auth;
use DB;
use Input;
use App\User;
use App\File;
use App\Bid;
use App\Penalty;
use App\ChatMessage;
use Paypal;
use Chat;

use URL;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Config;
class OrdersController extends Controller
{

    private $_api_context;

    public function __construct()
    {
       
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

public function postPayment()
{

     if (isset($_GET['pay_amount']) && isset($_GET['order_title'] ) && isset($_GET['id'] )) {

    $pay_amount  = $_GET['pay_amount'];
    $order_title  = $_GET['order_title'];
    $orderid = $_GET['id'];


    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $item = new Item();
    $item->setName($order_title)
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setPrice($pay_amount);

    // add item to list
    $item_list = new ItemList();
    $item_list->setItems(array($item));

    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal($pay_amount);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Pay for Order '.$order_title.'  amount '.$pay_amount);

    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl(URL::route('payment.status')) // Specify return URL
        ->setCancelUrl(URL::route('payment.status'));

    $payment = new Payment();
    $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));

        try {
    $payment->create($this->_api_context);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode(); // Prints the Error Code
            echo $ex->getData(); // Prints the detailed error message 
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    foreach($payment->getLinks() as $link) {
        if($link->getRel() == 'approval_url') {
            $redirect_url = $link->getHref();
            break;
        }
    }

    // add payment ID to session
    Session::put('paypal_payment_id', $payment->getId());

    if(isset($redirect_url)) {
        // redirect to paypal
        return Redirect::away($redirect_url);
    }

    return Redirect::route('original.route')
        ->with('error', 'Unknown error occurred');
    }

}


public function getPaymentStatus()
{
    // Get the payment ID before session clear
    $payment_id = Session::get('paypal_payment_id');

    // clear the session payment ID
    Session::forget('paypal_payment_id');

    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        return Redirect::route('original.route')
            ->with('error', 'Payment failed');
    }

    $payment = Payment::get($payment_id, $this->_api_context);

    // PaymentExecution object includes information necessary 
    // to execute a PayPal account payment. 
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site
    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));

      //Execute the payment
   
            try {
             $result = $payment->execute($execution, $this->_api_context);
                } catch (PayPal\Exception\PayPalConnectionException $ex) {
                    echo $ex->getData(); // Prints the detailed error message 
                    die($ex);

                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    die($ex);
                }



    if ($result->getState() == 'approved') { // payment made
        return Redirect::route('original.route')
            ->with('success', 'Payment success');
    }
    return Redirect::route('original.route')
        ->with('error', 'Payment failed');
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            $count_confirmed = DB::table('orders')
            ->where('status', '=', 'Confirmed')
            ->count();
            $count_revision = DB::table('orders')
            ->where('status', '=', 'Revision')
            ->count();
            $count_editing = DB::table('orders')
            ->where('status', '=', 'Editing')
            ->count();
            $count_all_orders = DB::table('orders')->count();
            $count_available_orders = Order::where('status', '=', 'AV')->count();

            return view('layouts.admin', ['count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_revision'=>$count_revision, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);

    }

    

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            $count_confirmed = DB::table('orders')
            ->where('status', '=', 'Confirmed')
            ->count();
            $count_revision = DB::table('orders')
            ->where('status', '=', 'Revision')
            ->count();
            $count_editing = DB::table('orders')
            ->where('status', '=', 'Editing')
            ->count();
            $count_all_orders = DB::table('orders')->count();
            $count_available_orders = Order::where('status', '=', 'AV')->count();

            return view('orders.create_order', ['count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_revision'=>$count_revision, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'doctype_x'       => 'required',
            'topic'      => 'required',
            'academic_level'      => 'required',
            'o_interval'      => 'required',
            'numberOfSources'      => 'required',
            'order_category'      => 'required',
            'urgency'      => 'required',
            'writing_style'      => 'required',
            'details'      => 'required',
            'numpages'      => 'required'
           
        );
        $validator = Validator::make($input_data = $request->all(), $rules);

        // process form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
  
       
        // dd($input_data);
           
        $neworder = New Order;
        $neworder->client_id = Auth::user()->id;
        $neworder->doctype = $input_data['doctype_x'];
        $neworder->order_title = $input_data['topic'];
        $neworder->order_level = $input_data['academic_level'];
        $neworder->no_of_pages = $input_data['numpages'];
        $neworder->spacing = $input_data['o_interval'];
        $neworder->discipline = $input_data['order_category'];
        $neworder->deadline = $input_data['urgency'];
        $neworder->client_price = $input_data['totals'];
        
        $neworder->citation = $input_data['writing_style'];
        $neworder->no_of_sources = $input_data['numberOfSources'];
        $neworder->instructions = $input_data['details'];

        $neworder->save();

        
        return redirect()->action('OrdersController@postPayment', ['id'=>$neworder['id'], 'pay_amount'=>$input_data['totals'], 'order_title'=>$input_data['topic']]);
       
    }
}

public function uploaddraft(Request $request) 
{
     $rules = array(
            'name'       => 'required',
           
           
        );
        $validator = Validator::make($input_data = $request->all(), $rules);

        // process form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
  

        $newfile = New File;
        $file = $input_data['name'];

        $destinationPath = 'uploads/drafts'; // upload path
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(1111111111, 9999999999) . '.' . $extension;

        $file->move($destinationPath, $fileName); // uploading file to given path
        $newfile->name = $fileName;
        $newfile->status = 'draft';
        $newfile->user_id = Auth::user()->id;
        $newfile->order_id = $input_data['order_id'];

        $newfile->save();

        Session::flash('success_message', 'file uploaded successifuly!');
        return redirect()->back();
    }
}

public function uploadcomplete(Request $request) 
{
     $rules = array(
            'name'       => 'required',
           
           
        );
        $validator = Validator::make($input_data = $request->all(), $rules);

        // process form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
  

        $newfile = New File;
        $file = $input_data['name'];

        $destinationPath = 'uploads/order_files'; // upload path
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(1111111111, 9999999999) . '.' . $extension;

        $file->move($destinationPath, $fileName); // uploading file to given path
        $newfile->name = $fileName;
        $newfile->status = 'complete';
        $newfile->user_id = Auth::user()->id;

        $newfile->order_id = $input_data['order_id'];

        $newfile->save();

        Session::flash('success_message', 'file uploaded successifuly!');
        return redirect()->back();
    }
}

public function complete(Request $request) 
{
     $rules = array(
            'name'       => 'required',
           
           
        );
        $validator = Validator::make($input_data = $request->all(), $rules);

        // process form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
  

        $newfile = New File;
        $file = $input_data['name'];

        $destinationPath = 'uploads/order_files'; // upload path
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(1111111111, 9999999999) . '.' . $extension;

        $file->move($destinationPath, $fileName); // uploading file to given path
        $newfile->name = $fileName;
        $newfile->status = 'complete';
        $newfile->user_id = Auth::user()->id;

        $newfile->order_id = $input_data['order_id'];

        $newfile->save();
        Order::where('id', $input_data['order_id'])
                  ->update(['status' => 'Completed']);

        Session::flash('success_message', 'file uploaded successifuly!');
        return redirect()->back();
    }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order_time = DB::table('orders')->select('client_price', 'deadline')->where('id', $id)->first();
        //dd($order_time);


        $time1 = $order_time->deadline;
        $time2 = time();
        $difference = $time1 - $time2;
        //dd($difference);
        $diffSeconds = $difference;
        $days = intval($difference / 86400);
        $difference = $difference % 86400;
        $hours = intval($difference / 3600);
        $difference = $difference % 3600;
        $minutes = intval($difference / 60);
        $difference = $difference % 60;
        $seconds = intval($difference);
        $remaining_time = $days.":d, ".$hours.":h, ".$minutes.":m "; 

       
        $clients = DB::table('user_role')->select('users.id AS userid', 'users.name')
            ->join('users', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'roles.id', '=', 'user_role.role_id')
            ->where('roles.name', 'client')
            ->get();

         $admins = DB::table('user_role')->select('users.id AS userid', 'users.name')
            ->join('users', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'roles.id', '=', 'user_role.role_id')
            ->where('roles.name', 'admin')
            ->get();


      
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
            $count_available_orders = Order::where('status', '=', 'Available')->count();
           
          

        $files = DB::table('files')->select('files.id AS filesid', 'files.name as filename', 'files.status', 'roles.name AS rolename')
            ->join('orders', 'orders.id', '=', 'files.order_id')
            ->join('users', 'users.id', '=', 'files.user_id')
            ->join('user_role', 'user_role.user_id', '=', 'files.user_id')
            ->join('roles', 'roles.id', '=', 'user_role.role_id')
            ->where('files.order_id', $id)
            ->get();
        $vieworder = Order::findOrFail($id);

        $deadline = date('Y-m-d', $vieworder->deadline);
        //dd($vieworder);
      
        return view('orders.order_details', ['clients'=>$clients, 'admins'=>$admins, 'vieworder'=>$vieworder, 'deadline'=>$deadline, 'difference'=>$difference, 'files'=>$files,  'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'remaining' => $remaining_time, 'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);
    }

    public function show_writer_order($id) 
    {
        $writers = DB::table('user_role')
            ->join('users', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'roles.id', '=', 'user_role.role_id')
            ->where('roles.name', 'writer')
            ->get();

        $files = DB::table('files')->select('files.id AS filesid', 'files.name as filename', 'files.status', 'roles.name AS rolename')
            ->join('orders', 'orders.id', '=', 'files.order_id')
            ->join('users', 'users.id', '=', 'files.user_id')
            ->join('user_role', 'user_role.user_id', '=', 'files.user_id')
            ->join('roles', 'roles.id', '=', 'user_role.role_id')
            ->where('files.order_id', $id)
            ->get();

        $vieworder = Order::findOrFail($id);

        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Available')->count();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
        $count_my_bids = Bid::where('by_id', Auth::user()->id)->count();
        $count_adminbids = DB::table('orders')->where('status', 'Available')->where('applied', 1)->count();
        $count_assigned = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.assigned_to')
        ->where('status', '=', 'Unconfirmed')
        ->where('assigned_to', Auth::user()->id)
        ->count();
        $current_count = DB::table('orders')->where('status', '=', 'Confirmed')->where('assigned_to', Auth::user()->id)->count();
        $mybids = DB::table('bids')
        ->where('bid_order_no', $id)
        ->where('by_id', Auth::user()->id)
        ->first();

      //dd($mybids);
        // $mybids = $mybid[0];
        return view('orders.order_details', ['vieworder'=>$vieworder, 'files'=>$files, 'writers'=>$writers, 'mybids'=>$mybids, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'count_my_bids'=>$count_my_bids, 'count_adminbids'=>$count_adminbids, 'count_assigned'=>$count_assigned, 'current_count'=>$current_count]);
    }

        public function pending() 
        {
        $pending = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'no_of_pages', 'client_price')
        ->where('status', '=', 'Available')
        ->get();


         $mypendingorders = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'no_of_pages', 'client_price')
         ->join('users', 'users.id', '=', 'orders.client_id')
         ->where('client_id', Auth::user()->id)
         ->where('status', '=', 'Available')
         ->get();

       
        $count_approved = DB::table('orders')
        ->where('status', '=', 'Approved')
        ->count();
        $count_completed = DB::table('orders')
        ->where('status', '=', 'Completed')
        ->count();
        $count_editing = DB::table('orders')
        ->where('status', '=', 'Editing')
        ->count();
        $count_revision = DB::table('orders')
        ->where('status', '=', 'Revision')
        ->count();
        $count_confirmed = DB::table('orders')
        ->where('status', '=', 'Confirmed')
        ->count();
       

        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Paid')->count();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
       
        $current_count = DB::table('orders')->where('status', '=', 'Confirmed')->where('client_id', Auth::user()->id)->count();

        return view('orders.pending', ['pendingorders'=>$pending,  'mypendingorders'=>$mypendingorders, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'current_count'=>$current_count, 'count_confirmed'=>$count_confirmed, 'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved]);
    }

 


    public function revision() 
    {
        $revision = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'no_of_pages', 'client_price')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->where('status', '=', 'Revision')
        ->get();

        $my_revisions = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'no_of_pages', 'client_price')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Revision')
        ->where('client_id', Auth::user()->id)
        ->get();
       
        $count_approved = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Approved')
        ->count();
        $count_completed = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Completed')
        ->count();

        $count_revision = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Revision')
        ->count();
        $count_confirmed = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Confirmed')
        ->count();
        $count_assigned_but_unconfirmed = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Unconfirmed')
        ->count();
        

        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Available')->count();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
       
        $current_count = DB::table('orders')->where('status', '=', 'Confirmed')->where('user_id', Auth::user()->id)->count();

        return view('orders.revision_orders', ['revision'=>$revision, 'my_revisions'=>$my_revisions, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'current_count'=>$current_count, 'count_assigned_but_unconfirmed'=>$count_assigned_but_unconfirmed, 'count_confirmed'=>$count_confirmed, 'count_revision'=>$count_revision, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved]);
    }

    

    public function completed() 
    {
        $completed = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'no_of_pages', 'client_price')
        ->where('status', '=', 'Completed')
        ->get();

        $my_completed_orders = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'no_of_pages', 'client_price')
         ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Completed')
        ->where('client_id', Auth::user()->id)
        ->get();
         
       
        $count_approved = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Approved')
        ->count();
        $count_completed = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Completed')
        ->count();

        $count_revision = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Revision')
        ->count();
        $count_confirmed = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Confirmed')
        ->count();
        $count_assigned_but_unconfirmed = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.client_id')
        ->where('status', '=', 'Unconfirmed')
        ->count();
        

        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Paid')->count();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
       
        $current_count = DB::table('orders')->where('status', '=', 'Confirmed')->where('user_id', Auth::user()->id)->count();

        return view('orders.completed_orders', ['completed'=>$completed, 'my_completed_orders'=>$my_completed_orders, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'current_count'=>$current_count, 'count_assigned_but_unconfirmed'=>$count_assigned_but_unconfirmed, 'count_confirmed'=>$count_confirmed, 'count_revision'=>$count_revision, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved]);
    }

    public function approved() 
    {
        $approved = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'remaining_time', 'no_of_pages', 'client_price', 'deadline')
        ->where('status', '=', 'Approved')
        ->get();

        $my_approved_orders = DB::table('orders')->select('orders.id AS orderid', 'order_title', 'discipline', 'order_level', 'remaining_time', 'no_of_pages', 'client_price')
        ->join('users', 'users.id', '=', 'orders.assigned_to')
        ->where('status', '=', 'Approved')
        ->where('assigned_to', Auth::user()->id)
        ->get();

         $count_disputes = DB::table('orders')
        ->where('status', '=', 'Disputed')
        ->count();
        $count_rejected = DB::table('orders')
        ->where('status', '=', 'Rejected')
        ->count();
        $count_approved = DB::table('orders')
        ->where('status', '=', 'Approved')
        ->count();
        $count_completed = DB::table('orders')
        ->where('status', '=', 'Completed')
        ->count();
        $count_editing = DB::table('orders')
        ->where('status', '=', 'Editing')
        ->count();
        $count_revision = DB::table('orders')
        ->where('status', '=', 'Revision')
        ->count();
        $count_confirmed = DB::table('orders')
        ->where('status', '=', 'Confirmed')
        ->count();
        $count_assigned_but_unconfirmed = DB::table('orders')
        ->where('status', '=', 'Unconfirmed')
        ->count();
        $count_assigned = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.assigned_to')
            ->where('status', '=', 'Unconfirmed')
            ->where('assigned_to', Auth::user()->id)
            ->count();

        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Available')->count();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
        $count_my_bids = Bid::where('by_id', Auth::user()->id)->count();
        $count_adminbids = DB::table('orders')->where('status', 'Available')->where('applied', 1)->count();
        $current_count = DB::table('orders')->where('status', '=', 'Confirmed')->where('assigned_to', Auth::user()->id)->count();

        return view('orders.approved_orders', ['approved'=>$approved, 'my_approved_orders'=>$my_approved_orders, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'count_my_bids'=>$count_my_bids, 'count_adminbids'=>$count_adminbids, 'count_assigned' =>$count_assigned, 'current_count'=>$current_count, 'count_assigned_but_unconfirmed'=>$count_assigned_but_unconfirmed, 'count_confirmed'=>$count_confirmed, 'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected, 'count_disputes'=>$count_disputes]);
    }

    


    public function current() 
    {
        $current_orders = DB::table('orders')->where('status', '=', 'Confirmed')->where('client_id', Auth::user()->id)->get();
        $current_count = DB::table('orders')->where('status', '=', 'Confirmed')->where('assigned_to', Auth::user()->id)->count();
        

      
        $count_approved = DB::table('orders')
        ->where('status', '=', 'Approved')
        ->count();
        $count_completed = DB::table('orders')
        ->where('status', '=', 'Completed')
        ->count();
        $count_editing = DB::table('orders')
        ->where('status', '=', 'Editing')
        ->count();
        $count_confirmed = DB::table('orders')
        ->where('status', '=', 'Confirmed')
        ->count();
        $count_revision = DB::table('orders')
        ->where('status', '=', 'Revision')
        ->count();
       
        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Available')->count();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
       

        return view('orders.current', ['current_orders'=>$current_orders, 'current_count'=>$current_count, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count_disputes = DB::table('orders')
        ->where('status', '=', 'Disputed')
        ->count();
         $current_count = DB::table('orders')->where('status', '=', 'Confirmed')->where('client_id', Auth::user()->id)->count();
      
        $count_approved = DB::table('orders')
        ->where('status', '=', 'Approved')
        ->count();
        $count_completed = DB::table('orders')
        ->where('status', '=', 'Completed')
        ->count();
        $count_editing = DB::table('orders')
        ->where('status', '=', 'Editing')
        ->count();
        $count_confirmed = DB::table('orders')
        ->where('status', '=', 'Confirmed')
        ->count();
        $count_revision = DB::table('orders')
        ->where('status', '=', 'Revision')
        ->count();
       
        $count_all_orders = DB::table('orders')->count();
        $count_available_orders = Order::where('status', '=', 'Available')->count();
        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();
        
        $order = Order::find($id);

        return view('orders.edit_order', ['order'=>$order, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'current_count'=>$current_count, 'current_count'=>$current_count, 'count_confirmed'=>$count_confirmed, 'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved]);
    }

   public function orderactions(Request $request)
    {
         $rules = array(
            'ids'       => 'required',
           
           
        );

         $input_data = $request->all();

        $validator = Validator::make($input_data, $rules);

        // dd($input_data);

        // process form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
       
        // delete
    if ($request->has('doDelete')){
    if($input_data['doDelete'] == 'Delete') {
            foreach ($input_data['ids'] as $id) {
            $order = Order::find($id);
            if (!is_null($order)) {
            $order->delete();

            // redirect
            Session::flash('flash_message', 'order deleted successfully.');
            return Redirect::to('/manage_orders');
            }
        }
 }
 } else
 if ($request->has('makeAvailable')){
 if ($input_data['makeAvailable'] == 'Make Available') {
            // dd($input_data);
            foreach ($input_data['ids'] as $uid) {

                $id = filter_var($uid);
                
            Order::where('id', $id)
            ->update(['status' => 'Available', 'order_status'=> 1, 'confirm' =>0, 'paid' =>0, 'applied' =>0, 'ext_rqst' =>0]);

            Session::flash('success_message', 'order made available successfully.');
            return Redirect::to('/home');
        
        }
    } 
} else
    if ($request->has('UnApprove')){
    if($input_data['UnApprove'] == 'Un Approve') {
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['status' => '', 'order_status'=> 0]);

                   //Bid::where('bid_order_no', $id)->delete();      
        // redirect
        \Session::flash('flash_message', 'order un approved successfully.');
                return Redirect::to('/manage_orders');
        
    }
 }
 } else
     if ($request->has('markAsCompleted')){
     if($input_data['markAsCompleted'] == 'Mark As Done') {
       
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['status' => 'Completed']);

                   

                   //Bid::where('bid_order_no', $id)->delete();      
        // redirect
        \Session::flash('flash_message', 'Order(s) marked as completed successfully.');
                return Redirect::to('/manage_orders');
        
    }
 }
 } else
     if ($request->has('doReturnToEditing')){
     if($input_data['doReturnToEditing'] == 'Return To Editing') {
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['status' => 'Editing']);

                   //Bid::where('bid_order_no', $id)->delete();      
        // redirect
        Session::flash('flash_message', 'Order(s) returned to editing successfully.');
                return Redirect::to('/manage_orders');
        
    }
 }
 } else
     if ($request->has('Disapprove')){
     if($input_data['Disapprove'] == 'Disapprove') {
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['status' => '', 'approve' =>0, 'order_status' =>0]);

                   //Bid::where('bid_order_no', $id)->delete();      
        // redirect
        \Session::flash('flash_message', 'Order(s)  dis-approved successfully.');
                return Redirect::to('/manage_orders');
        
    }
 } 
}else
     if ($request->has('doRemove')){
     if($input_data['doRemove'] == 'Remove') {
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['removed_order' => 1, 'paid' =>0, 'order_status' =>0, 'applied' =>0, 'status' =>'Rmv',  'confirm' =>0, 'request_re_assign' =>0]);

                   //Bid::where('bid_order_no', $id)->delete();      
        // redirect
        \Session::flash('flash_message', 'Order(s)  removed successfully.');
                return Redirect::to('/manage_orders');
        
        }
    }
}

}





 public function completedorderaction(Request $request)
    {
         $rules = array(
            'ids'       => 'required',
           
           
        );

         $input_data = $request->all();

        $validator = Validator::make($input_data, $rules);

        // dd($input_data);

        // process form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
       
  
 if ($request->has('approve')){
 if ($input_data['approve'] == 'Mark As Approved') {
            // dd($input_data);
            foreach ($input_data['ids'] as $id) {
            $approvaldate = date("d.m.Y");
                
            Order::where('id', $id)
            ->update(['status' => 'Approved', 'approvaldate'=>$approvaldate]);

            $thisorder = DB::table('orders')->select('email', 'assigned_to', 'username')
                    ->join('users','users.id', '=', 'orders.assigned_to')
                    ->where('orders.id', $id)->first();

              $mail = new \PHPMailer(true);
                try{
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->SMTPAuth =true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = "smtp.gmail.com"; //gmail has host > smtp.gmail.com
                    $mail->Port = 587; //gmail has port > 587 . without double quotes
                    $mail->Username = "walterokenye@gmail.com"; //your username. actually your email
                    $mail->Password = "finnacle@1992"; // your password. your mail password
                    $mail->setFrom('kenyanprowriters@gmail.com', 'Jackson Mwai'); 
                    $mail->Subject = "Order Approved";
                    $mail->MsgHTML('Hello "'.$thisorder->username.'" Order "No. '.$id.'"  
                        has been approved. <br>
                        It is now under Appoved list. <br><br>
                        <span style="color:#253350; font-weight:bold; font-size:15px;">
                        Regards,<br>
                        Support Department, <br>
                        <strong><i>"TheCustomWriters" </i></strong><br>
                        Email: "kenyanprowriters@gmail.com"
                        ');
                $mail->addAddress($thisorder->email ,$thisorder->username); 
                    $mail->send();
                }catch(phpmailerException $e){
                    dd($e);
                }catch(Exception $e){
                    dd($e);
                }

            \Session::flash('flash_message', 'order approved successfully.');
            return redirect()->back();
        
        }
    } 
} else
    if ($request->has('revision')){
    if($input_data['revision'] == 'Return to Revision') {
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['status' => 'Revision']);

                  $thisorder = DB::table('orders')->select('email', 'assigned_to', 'username')
                    ->join('users','users.id', '=', 'orders.assigned_to')
                    ->where('orders.id', $id)->first();

              $mail = new \PHPMailer(true);
                try{
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->SMTPAuth =true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = "smtp.gmail.com"; //gmail has host > smtp.gmail.com
                    $mail->Port = 587; //gmail has port > 587 . without double quotes
                    $mail->Username = "walterokenye@gmail.com"; //your username. actually your email
                    $mail->Password = "finnacle@1992"; // your password. your mail password
                    $mail->setFrom('kenyanprowriters@gmail.com', 'Jackson Mwai'); 
                    $mail->Subject = "Revision Request";
                    $mail->MsgHTML('A revision has been requested on Order "No. '.$id.'"  <br>
                        Please login and, Check Revision listings, review the instructions (at the orders details page)<br> 
                        If you have any questions or requests, contact the Support or Editorial team. <br><br>
                        <span style="color:#253350; font-weight:bold; font-size:15px;">
                        Regards,<br>
                        Support Department, <br>
                        <strong><i>"TheCustomWriters" </i></strong><br>
                        Email: "kenyanprowriters@gmail.com"');
                    $mail->addAddress($thisorder->email ,$thisorder->username); 
                    $mail->send();
                }catch(phpmailerException $e){
                    dd($e);
                }catch(Exception $e){
                    dd($e);
                }

                \Session::flash('flash_message', 'order returned to revision successfully.');
                return redirect()->back();
        
    }
 }
 } else
     if ($request->has('reject')){
     if($input_data['reject'] == 'Reject') {
       
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['status' => 'Rejected']);

                   $thisorder = DB::table('orders')->select('email', 'assigned_to', 'username')
                    ->join('users','users.id', '=', 'orders.assigned_to')
                    ->where('orders.id', $id)->first();

                    $mail = new \PHPMailer(true);
                     try{
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->SMTPAuth =true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = "smtp.gmail.com"; //gmail has host > smtp.gmail.com
                    $mail->Port = 587; //gmail has port > 587 . without double quotes
                    $mail->Username = "walterokenye@gmail.com"; //your username. actually your email
                    $mail->Password = "finnacle@1992"; // your password. your mail password
                    $mail->setFrom('kenyanprowriters@gmail.com', 'Jackson Mwai'); 
                    $mail->Subject = "Order Rejected";
                    $mail->MsgHTML('Dear "'.$thisorder->username.'" <br> Order "No. '.$id.'"  
                        has been rejected. <br>
                        It is placed under your Rejected list.<br>
                        If you have any questions or requests, contact the Support or Editorial team. <br><br>
                        <span style="color:#253350; font-weight:bold; font-size:15px;">
                        Regards,<br>
                        Support Department, <br>
                        <strong><i>"TheCustomWriters" </i></strong><br>
                        Email: "kenyanprowriters@gmail.com"
                        ');
                $mail->addAddress($thisorder->email ,$thisorder->username); 
                    $mail->send();
                }catch(phpmailerException $e){
                    dd($e);
                }catch(Exception $e){
                    dd($e);
                }

                   //Bid::where('bid_order_no', $id)->delete();      
                // redirect
                \Session::flash('flash_message', 'Order(s) marked as rejected successfully.');
                return redirect()->back();
        
    }
 }
 } else
     if ($request->has('dispute')){
     if($input_data['dispute'] == 'Dispute') {
            foreach ($input_data['ids'] as $id) {
                

                    Order::where('id', $id)
                  ->update(['status' => 'Disputed']);

                  $thisorder = DB::table('orders')->select('email', 'assigned_to', 'username')
                    ->join('users','users.id', '=', 'orders.assigned_to')
                    ->where('orders.id', $id)->first();

                    $mail = new \PHPMailer(true);
                     try{
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->SMTPAuth =true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = "smtp.gmail.com"; //gmail has host > smtp.gmail.com
                    $mail->Port = 587; //gmail has port > 587 . without double quotes
                    $mail->Username = "walterokenye@gmail.com"; //your username. actually your email
                    $mail->Password = "finnacle@1992"; // your password. your mail password
                    $mail->setFrom('kenyanprowriters@gmail.com', 'Jackson Mwai'); 
                    $mail->Subject = "Order Disputed";
                    $mail->MsgHTML('Dear "'.$thisorder->username.'" <br> Order "No. '.$id.'"  
                        has been disputed. <br>
                        It is placed under your Dispute list.<br>
                        If you have any questions or requests, contact the Support or Editorial team. <br><br>
                        <span style="color:#253350; font-weight:bold; font-size:15px;">
                        Regards,<br>
                        Support Department, <br>
                        <strong><i>"TheCustomWriters" </i></strong><br>
                        Email: "kenyanprowriters@gmail.com"
                        ');
                $mail->addAddress($thisorder->email ,$thisorder->username); 
                    $mail->send();
                }catch(phpmailerException $e){
                    dd($e);
                }catch(Exception $e){
                    dd($e);
                }

                   //Bid::where('bid_order_no', $id)->delete();      
        // redirect
        Session::flash('flash_message', 'You have successfully placed this order on dispute.');
                return redirect()->back();
        
    }
 }
 } 

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
        $rules = array(
            'doctype'       => 'required',
            'order_title'      => 'required',
            'order_level'      => 'required',
            'spacing'      => 'required',
            'discipline'      => 'required',
            'deadline'      => 'required',
            'client_price'      => 'required',
            'citation'      => 'required',
            'no_of_sources'      => 'required',
            'instructions'      => 'required',
            'no_of_pages'      => 'required'
           
        );
        $validator = Validator::make($input_data = $request->all(), $rules);

        // process form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
  
        $time1 = strtotime($input_data['deadline']);
        $time2 = time();
        $difference = $time1 - $time2;
        $diffSeconds = $difference;
        $days = intval($difference / 86400);
        $difference = $difference % 86400;
        $hours = intval($difference / 3600);
        $difference = $difference % 3600;
        $minutes = intval($difference / 60);
        $difference = $difference % 60;
        $seconds = intval($difference);
        $remaining = $days.":d, ".$hours.":h, ".$minutes.":m "; 
        
        
        $order_amount = $input_data['client_price'] * $input_data['no_of_pages'];
           
        $neworder = Order::find($id);
        $neworder->user_id = Auth::user()->id;
        $neworder->doctype = $input_data['doctype'];
        $neworder->order_title = $input_data['order_title'];
        $neworder->order_level = $input_data['order_level'];
        
        $neworder->no_of_pages = $input_data['no_of_pages'];
        $neworder->spacing = $input_data['spacing'];
        $neworder->discipline = $input_data['discipline'];
        $neworder->deadline = $time1;
        $neworder->client_price = $order_amount;
        
        $neworder->citation = $input_data['citation'];
        $neworder->no_of_sources = $input_data['no_of_sources'];
        $neworder->remaining_time = $remaining;
        $neworder->instructions = $input_data['instructions'];

        $neworder->save();

        
        Session::flash('success_message', 'order updated successifuly!');
        return redirect()->back();
    }
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

    public function setdeadline(Request $request)
    {
        $input_data = $request->all();
        //dd($input_data);

     
        //$time1 = strtotime($deadline['deadline']);
        $time2 = $input_data['hours'];
         Order::where('id', $input_data['order_id'])
        ->update(['deadline' => $time2]);

            Session::flash('success_message', 'Deadline set successifuly.');
            return redirect()->back();
        

    }

    public function extension(Request $request)
    {
        $input_data = $request->all();

        $thisorder = DB::table('orders')->select('email', 'assigned_to', 'username')
                    ->join('users','users.id', '=', 'orders.assigned_to')
                    ->where('orders.id', $input_data['order_id'])->first();

                    $mail = new \PHPMailer(true);
                     try{
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->SMTPAuth =true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = "smtp.gmail.com"; //gmail has host > smtp.gmail.com
                    $mail->Port = 587; //gmail has port > 587 . without double quotes
                    $mail->Username = "walterokenye@gmail.com"; //your username. actually your email
                    $mail->Password = "finnacle@1992"; // your password. your mail password
                    $mail->setFrom('kenyanprowriters@gmail.com', 'Jackson Mwai'); 
                    $mail->Subject = "Extension Request";
                    $mail->MsgHTML('"'.$thisorder->username.'" has requested an extension of "'.$input_data['time'].'" On order "No. '.$input_data['order_id'].'" Reason "'.$input_data['reason'].'"  
                       . <br><br>
                        <span style="color:#253350; font-weight:bold; font-size:15px;">
                        Regards,<br>
                        Support Department, <br>
                        <strong><i>"TheCustomWriters" </i></strong><br>
                        Email: "kenyanprowriters@gmail.com"
                        ');
                $mail->addAddress('kenyanprowriters@gmail.com' ,'Jackson Mwai'); 
                    $mail->send();
                }catch(phpmailerException $e){
                    dd($e);
                }catch(Exception $e){
                    dd($e);
                }

                   //Bid::where('bid_order_no', $id)->delete();      
        // redirect
        Session::flash('flash_message', 'You just requested a deadline extension of "'.$input_data['time'].'" on this Order. Kindly await the response from the admin.');
                return redirect()->back();


    }

  
}
