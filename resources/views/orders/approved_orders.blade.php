@extends('layouts.admin')

@section('content')
<style type="text/css">
    .uk-table tfoot td, .uk-table tfoot th, .uk-table thead th{
        color:#168f9f;
    }
</style>
 <div id="page_content">
        <div id="page_content_inner">
        


 <h4 class="heading_a uk-margin-bottom">Approved Orders</h4>
    <div class="md-card uk-margin-medium-bottom">
      <div class="md-card-content">
       @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
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
                            <th>Cost (USD)</th>
                            
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($approved as $order)
                        <tr>
                            <td>{{$order->orderid}}</td>
                            <td><a href="{{ URL::route('view_order', $order->orderid) }}" >{{$order->order_title}}</a></td>
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
          @endif
          @if(Auth::user()->hasRole('writer'))
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
                            <th>Cost (USD)</th>
                            
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($my_approved_orders as $order)
                        <tr>
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