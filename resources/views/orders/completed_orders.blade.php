@extends('layouts.admin')
@section('content')
<style type="text/css">
    .uk-table tfoot td, .uk-table tfoot th, .uk-table thead th{
        color:#168f9f;
    }
</style>
<div id="page_content">
  <div id="page_content_inner">
    <h4 class="heading_a uk-margin-bottom">Completed Orders</h4>
    <div class="md-card uk-margin-medium-bottom">
    @if(Session::has('flash_message'))
    <div class="uk-alert uk-alert-success">{!! session('flash_message') !!}</div>
    @endif
      <div class="md-card-content">
      @if(Auth::user()->hasRole('admin'))
       
           
           <table id="dt_individual_search" class="uk-table uk-table-striped" cellspacing="0" width="100%" id="thetable">
            <thead>
              <tr style="background:#eeeeee">
                            <th><input type="checkbox" id="master"></th>
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
                            <th></th>
                            <th>Order No</th>
                            <th>Title</span></th>
                            <th>Subject Area</th>
                            <th>Academic Level</th>
                            <th>Due</th>
                            <th>Pages</th>
                            <th>Cost (USD)</th>
                            
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($completed as $order)
                        <tr data-row-id="{{$order->orderid}}">
                         <td> <input type="checkbox" name="ids[]" class="sub_chk" value="{{$order->orderid}}"></td>
                            <td>{{$order->orderid}}</td>
                            <td><a href="{{ URL::route('view_order', $order->orderid) }}" >{{$order->order_title}}</a></td>
                            <td><span>{{$order->discipline}}</span></td>
                             <td>{{$order->order_level}}</td>
                            <td><span>{{$order->remaining_time}}</span></td>
                             <td><span>{{$order->no_of_pages}}</span></td>
                              <td>{{$order->client_price}}</td>
                          
                        </tr>
                        @endforeach
            </tbody>
          </table>
         
       
        @endif
        @if(Auth::user()->hasRole('client'))
        <table id="dt_individual_search" class="uk-table uk-table-striped" cellspacing="0" width="100%" id="thetable">
            <thead>
              <tr style="background:#eeeeee">
                            <th><input type="checkbox" id="master"></th>
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
                            <th></th>
                            <th>Order No</th>
                            <th>Title</span></th>
                            <th>Subject Area</th>
                            <th>Academic Level</th>
                            <th>Due</th>
                            <th>Pages</th>
                            <th>Cost (USD)</th>
                            
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($my_completed_orders as $order)
                        <tr data-row-id="{{$order->orderid}}">
                         <td> <input type="checkbox" name="ids[]" class="sub_chk" value="{{$order->orderid}}"></td>
                            <td>{{$order->orderid}}</td>
                            <td><a href="{{ URL::route('view_order', $order->orderid) }}" >{{$order->order_title}}</a></td>
                            <td><span>{{$order->discipline}}</span></td>
                             <td>{{$order->order_level}}</td>
                            <td><span>{{$order->remaining_time}}</span></td>
                             <td><span>{{$order->no_of_pages}}</span></td>
                              <td>{{$order->client_price}}</td>
                          
                        </tr>
                        @endforeach
            </tbody>
          </table>
          @endif
      </div>
    </div>
  </div>
</div>
@endsection
@section('page-script')
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