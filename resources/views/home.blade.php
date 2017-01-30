@extends('layouts.admin')
@section('content')
@if(Auth::user()->hasRole('admin'))
<style type="text/css">
  .uk-table tfoot td, .uk-table tfoot th, .uk-table thead th{
  color:#168f9f;
  }
</style>
<div id="page_content">
  <div id="page_content_inner">
    <!-- statistics (small charts) -->

    <h4 class="heading_a uk-margin-bottom">Available Orders</h4>
    <div class="md-card uk-margin-medium-bottom">
      <div class="md-card-content">
        <table id="dt_individual_search" class="uk-table uk-table-striped" cellspacing="0" width="100%" id="thetable">
          <thead>
            <tr style="background:#eeeeee">
              <th>Order No</th>
              <th>Title</span></th>
              <th>Subject Area</th>
              <th>Academic Level</th>
              <th>Due</th>
              <th>Pages</th>
              <th>Cost (USD)</th>
            </tr>
          </thead>
          <tfoot>
            <tr style="background:#eeeeee">
              <th>Order No</th>
              <th>Title</span></th>
              <th>Subject Area</th>
              <th>Academic Level</th>
              <th>Due</th>
              <th>Pages</th>
              <th>Cost (KES)</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td><a href="{{ URL::route('view_order', $order->id) }}">{{$order->id}}</a></td>
              <td><a href="{{ URL::route('view_order', $order->id) }}">{{$order->order_title}}</a></td>
              <td><span>{{$order->discipline}}</span></td>
              <td>{{$order->order_level}}</td>
              <td><span><?php $time = $order->deadline;
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
              <td><span>{{$order->no_of_pages}}</span></td>
              <td>{{$order->client_price}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endif
@if(Auth::user()->hasRole('client'))
<style type="text/css">
  .uk-table tfoot td, .uk-table tfoot th, .uk-table thead th{
  color:#168f9f;
  }
</style>
<div id="page_content">
  <div id="page_content_inner">
    <!-- statistics (small charts) -->
    @if(Session::has('success_message'))
                          <div class="uk-alert uk-alert-success">{!! session('success_message') !!}</div>
        @endif
    <h4 class="heading_a uk-margin-bottom">My Current Orders</h4>
     <div class="uk-width-medium-1-5 uk-grid-margin uk-row-first">
                            <a class="md-btn md-btn-success md-btn-block md-btn-wave-light waves-effect waves-button waves-light" href="{{url('new_order')}}" style="margin-left:800px;">Create New Order</a>
                        </div>
    <div class="md-card uk-margin-medium-bottom">
   
      <div class="md-card-content">
        <table id="dt_individual_search" class="uk-table uk-table-striped" cellspacing="0" width="100%" id="thetable">
          <thead>
            <tr style="background:#eeeeee">
              <th>Order No</th>
              <th>Title</span></th>
              <th>Subject Area</th>
              <th>Academic Level</th>
              <th>Due</th>
              <th>Pages</th>
              <th>Cost (USD)</th>
            </tr>
          </thead>
          <tfoot>
            <tr style="background:#eeeeee">
              <th>Order No</th>
              <th>Title</span></th>
              <th>Subject Area</th>
              <th>Academic Level</th>
              <th>Due</th>
              <th>Pages</th>
              <th>Cost (KES)</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($myorders as $order)
            <tr>
              <td><a href="{{ URL::route('view_order', $order->id) }}">{{$order->id}}</a></td>
              <td><a href="{{ URL::route('view_order', $order->id) }}">{{$order->order_title}}</a></td>
              <td><span>{{$order->discipline}}</span></td>
              <td>{{$order->order_level}}</td>
              <td><span><?php $time = $order->deadline;
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
              <td><span>{{$order->no_of_pages}}</span></td>
              <td>{{$order->client_price}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
@section('page-script')
<!-- page specific plugins -->
{!! Html::script('admin/bower_components/datatables/media/js/jquery.dataTables.min.js') !!}
{!! Html::script('admin/bower_components/datatables-colvis/js/dataTables.colVis.js') !!}
{!! Html::script('admin/bower_components/datatables-tabletools/js/dataTables.tableTools.js') !!}
{!! Html::script('admin/assets/js/custom/datatables_uikit.min.js') !!}
{!! Html::script('admin/assets/js/pages/plugins_datatables.min.js') !!}
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