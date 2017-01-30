<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Nahid\Talk\Facades\Talk;
use Auth;
use View;
use DB;
use App\Order;
use Session;

class MessageController extends Controller
{
    protected $authUser;
    public function __construct()
    {
        $this->middleware('auth');
        Talk::setAuthUserId(Auth::user()->id);

        View::composer('messages.conversations', function($view) {
            $threads = Talk::threads();
            $view->with(compact('threads'));
        });
    }

    public function chatHistory($id)
    {
        $conversations = Talk::getMessagesByUserId($id);
        $user = '';
        $messages = [];
        if(!$conversations) {
            $user = User::find($id);
        } else {
            $user = $conversations->withUser;
            $messages = $conversations->messages;
        }


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

        $count_pending_orders = Order::where('order_status',  0)->where('status', '')->count();

        return view('messages.conversations', ['messages'=>$messages, 'user', 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'count_pending_orders'=>$count_pending_orders, 'remaining'=>Session::get('remaining'), 'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);
    }

    public function ajaxSendMessage(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'message-data'=>'required',
                '_id'=>'required'
            ];

            $this->validate($request, $rules);

            $body = $request->input('message-data');
            $userId = $request->input('_id');

            if ($message = Talk::sendMessageByUserId($userId, $body)) {
                $html = view('ajax.newMessageHtml', compact('message'))->render();
                return response()->json(['status'=>'success', 'html'=>$html], 200);
            }
        }
    }

    public function ajaxDeleteMessage(Request $request, $id)
    {
        if ($request->ajax()) {
            if(Talk::deleteMessage($id)) {
                return response()->json(['status'=>'success'], 200);
            }

            return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
        }
    }
}
