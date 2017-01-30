@extends('layouts.admin')

@section('content')
<style type="text/css">
    .uk-table tfoot td, .uk-table tfoot th, .uk-table thead th{
        color:#168f9f;
    }
</style>
 <div id="page_content">
        <div id="page_content_inner">
        


 <h4 class="heading_a uk-margin-bottom">All Users</h4>
    <div class="md-card uk-margin-medium-bottom">
      <div class="md-card-content">
       @if(Auth::user()->hasRole('admin'))
          <table id="dt_individual_search" class="uk-table uk-table-striped" cellspacing="0" width="100%" id="thetable">
            <thead>
              <tr style="background:#eeeeee">
                            <th>Name</th>
                            <th>email</span></th>
                            
                            <th>Action</th>
                            

                        </tr>
                        </thead>

                        <tfoot>
                        <tr style="background:#eeeeee">
                          <th>Name</th>
                            <th>email</span></th>
                            
                            <th>Action</th>
                            
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</a></td>
                           
                              <td><a class="md-btn md-btn-warning md-btn-wave-light" href="{{route('message.read', ['id'=>$user->id])}}">Send Message</a></td>
                          
                        </tr>
                        @endforeach
            </tbody>
          </table>
          @endif
          @if(Auth::user()->hasRole('client'))
          <table id="dt_individual_search" class="uk-table uk-table-striped" cellspacing="0" width="100%" id="thetable">
            <thead>
              <tr style="background:#eeeeee">
                            <th>Name</th>
                            
                            
                            <th>Action</th>
                            

                        </tr>
                        </thead>

                        <tfoot>
                        <tr style="background:#eeeeee">
                          <th>Name</th>
                           
                            
                            <th>Action</th>
                            
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($admins as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                           
                           
                              <td><a class="md-btn md-btn-warning md-btn-wave-light" href="{{route('message.read', ['id'=>$user->id])}}">Send Message</a></td>
                          
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