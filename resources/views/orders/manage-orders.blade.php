@extends('layouts.admin')
@section('content')
<style type="text/css">
    .uk-table tfoot td, .uk-table tfoot th, .uk-table thead th{
        color:#168f9f;
    }
</style>
<div id="page_content">
  <div id="page_content_inner">
    <h4 class="heading_a uk-margin-bottom">Manage Orders</h4>
    <div class="md-card uk-margin-medium-bottom">
    @if(Session::has('flash_message'))
    <div class="uk-alert uk-alert-success">{!! session('flash_message') !!}</div>
    @endif
      <div class="md-card-content">
        <form action="{{URL::route('order_action')}}" method="POST">

          {{ csrf_field() }}
           <p align="right">  
            <input name="makeAvailable" type="submit" class="md-btn md-btn-primary md-btn-mini" id="makeAvailable" value="Make Available">
            <input name="markAsCompleted" type="submit" class="md-btn md-btn-primary md-btn-mini" id="markAsCompleted" value="Mark As Done">
            <input name="doReturnToEditing" type="submit" class="md-btn md-btn-primary md-btn-mini" id="doReturnToEditing" value="Return To Editing">
            <input name="UnApprove" type="submit" class="md-btn md-btn-primary md-btn-mini" id="UnApprove" value="Un Approve">
            <input name="doRemove" type="submit" class="md-btn md-btn-primary md-btn-mini" id="doRemove" value="Remove">
            <input name="doDelete" type="submit" class="md-btn md-btn-primary md-btn-mini" id="doDelete" value="Delete">
          </p>
          <table id="dt_individual_search" class="uk-table uk-table-striped" cellspacing="0" width="100%" id="thetable">
            <thead>
              <tr>
                <th><input type="checkbox" id="master"></th>
                <th>Order No</th>
                <th>Client</span></th>
                <th>Created</th>
                <th>Track</th>
                <th>Due</th>
                <th>Status</th>
                <th>Pages</th>
                <th>Cost</th>
                <th>Assigned?</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th>Order No</th>
                <th>Client</span></th>
                <th>Created</th>
                <th>Track</th>
                <th>Due</th>
                <th>Status</th>
                <th>Pages</th>
                <th>Cost</th>
                <th>Assigned?</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($orders as $order)
              <tr data-row-id="{{$order->ordersid}}">
                <td> <input type="checkbox" name="ids[]" class="sub_chk" value="{{$order->ordersid}}"></td>
                <td><a href="{{ URL::route('view_order', $order->ordersid) }}">{{$order->ordersid}}</a></td>
                <td>{{$order->firstname}}</td>
                <td><span>{{$order->created_at}}</span></td>
                <td>{{$order->track_id}}</td>
                <td><span>
                <?php $time = $order->deadline;
                  $time2 = time();
                  $difference = $time - $time2;
                  $diffSeconds = $difference;
                  $days = intval($difference / 86400);
                  $difference = $difference % 86400;
                  $hours = intval($difference / 3600);
                  $difference = $difference % 3600;
                  $minutes = intval($difference / 60);
                  $difference = $difference % 60;
                  $seconds = intval($difference);
                  $remaining_time = $days.":d, ".$hours.":h, ".$minutes.":m "; 
                echo $remaining_time ?></span></td>
                <td><span style="color:orange">{{$order->status}}</span></td>
                <td><span>{{$order->no_of_pages}}</span></td>
                <td>{{$order->client_price}}</td>
                <td class="uk-text-center">{{$order->assigned_to}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
         
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page-script')

<script type="text/javascript" charset="utf-8">
    jQuery('#master').on('click', function(e) {
    if($(this).is(':checked',true))  
    {
        $(".sub_chk").prop('checked', true);  
    }  
    else  
    {  
        $(".sub_chk").prop('checked',false);  
    }  
});

   
</script>
@stop