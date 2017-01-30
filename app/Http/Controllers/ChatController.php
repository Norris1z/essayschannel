<?php

namespace App\Http\Controllers;

use Auth;
use App\Message;
use App\Http\Requests;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Events\MessageDeleted;
use App\Events\MessageUpdated;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\DeleteMessageRequest;
use DB;
use App\Order;
use Session;

class ChatController extends Controller
{
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
    	return view('chats', ['pending'=>$pending, 'count_all_orders'=>$count_all_orders, 'count_available_orders'=>$count_available_orders, 'remaining'=>Session::get('remaining'),  'count_revision'=>$count_revision, 'count_editing'=>$count_editing, 'count_completed'=>$count_completed, 'count_approved'=>$count_approved, 'count_rejected'=>$count_rejected]);
    }

    public function getMessage(int $message_id)
    {
    	$message = Message::findOrFail($message_id);
    	return (Auth::user()->id == $message->sender_id) ? $message : null;
    }

	public function getMessages(int $user_id)
	{
		return Message::where('sender_id', Auth::user()->id)
			->where('receiver_id', $user_id)
			->orWhere('sender_id', $user_id)
			->where('receiver_id', Auth::user()->id)
			->orderBy('created_at', 'asc')
			->get();
	}

	public function postMessage(StoreMessageRequest $request)
	{
		$message = new Message;
		$message->sender_id = Auth::user()->id;
		$message->receiver_id = $request->input('receiver_id');
		$message->content = $request->input('content');
		$message->save();

		event(new MessageSent($message));
	}

	public function updateMessage(StoreMessageRequest $request, int $message_id)
	{
		$message = Message::find($message_id);
		$message->content = $request->input('content');
		$message->save();
		event (new MessageUpdated($message));
	}

	public function deleteMessage(DeleteMessageRequest $request, int $message_id)
	{
		event (new MessageDeleted(Message::find($message_id)));
		Message::destroy($message_id);
	}

}
