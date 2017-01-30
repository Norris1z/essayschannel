@extends('layouts.admin')

@section('content')

<div id="page_content">
        <div id="page_content_inner">
         @if(Session::has('success_message'))
            <div class="uk-alert uk-alert-success">{!! session('success_message') !!}</div>
         @endif
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_menu" data-uk-dropdown="{pos:'left-top'}">
                                <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav">
                                        <li><a href="#">Edit</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="user_heading_avatar">
                               
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom">
                                <span class="uk-text-truncate">Order # {{$vieworder->id}} </span>
                                <span class="sub-heading">Status: <span style="color:orange">Available</span></span></h2>
                                <span class="sub-heading">Deadline ({{$vieworder->deadline}})</span>
                             
                            </div>
                           
                        </div>
                        <div class="user_content">
              
                        @if($mybids !== null)
                       
                        <div class="uk-alert uk-alert-warning" data-uk-alert>
                                <a href="#" class="uk-alert-close uk-close"></a>
                                You have already applied for this Order. Kindly await as Admin may assign it to you. 
                            </div>

                         @else
                       
                        <fieldset>
                            <legend>Apply For This Order</legend>
                            <p>Click "Apply", if you are ready to work on this Order for <span style="color:#7cb342">KES {{$vieworder->client_price}}</span></p>
                            <form method="POST" action="{{URL::route('place_bid')}}">
                            {{ csrf_field() }}
                                <input type="hidden" value="{{$vieworder->id}}" name="order_id">
                                <button type="submit" class="md-btn md-btn-primary">Apply</button>
                            </form>
                        </fieldset>

                       @endif
                        

                       
                            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                                <li class="uk-active"><a href="#">Order Details</a></li>
                                <li><a href="#">Upload Files</a></li>
                                <li><a href="#">Chats </a></li>
                                
                            </ul>
                            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                                               
                                   <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Details
                            </h3>
                        </div>
                        <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium">
                                <div class="uk-width-large-1-2">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Order Title</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            <span class="uk-text-large uk-text-middle"><a href="#">{{$vieworder->order_title}}</a></span>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Provide sources used?</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            <span class="uk-text-large uk-text-middle">{{$vieworder->digital_sources}}</span>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Paper type</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->doctype}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Paper format</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->citation}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Course level</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->order_level}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Subject Area</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->discipline}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small"># pages</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->no_of_pages}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                     <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small"># sources</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->no_of_sources}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Spacing</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->spacing}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Paper format</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->citation}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Max Bid</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            {{$vieworder->max_bid}}
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                  
                                    <hr class="uk-grid-divider uk-hidden-large">
                                </div>
                                <div class="uk-width-large-1-2">
                                    <p>
                                        <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">click on the link to download files</span>
                                       <ul>
                                    @foreach ($files as $file)
                                        <li><a href="/uploads/order_files/{{$file->filename}}" download="{{$file->filename}}">{{$file->filename}}</a> ({{$file->status}}) Uploaded by {{$file->rolename}}</li>
                                        @endforeach
                                    </ul>
                                    </p>
                                    <hr class="uk-grid-divider">
                                    <p>
                                        <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Description</span>
                                        {{$vieworder->instructions}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                                        
                                        
                                </li>
                               <li>
                                    <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                                        
                                       <div class="uk-grid">
                                                <h6>Upload Files</h6>
                                                <div class="uk-width-1-2">
                                                <form method="POST" action="{{URL::route('upload_complete_file')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                   <div class="form-group">
                                                   
                                                    <input type="file" name="name" id="file_name">
                                                    @if ($errors->has('order_file'))
                                                    <span class="help-block">
                                                    <strong><a href="" >{{ $errors->first('order_file') }}</strong>
                                                    </span>
                                                    @endif

                                               
                                                </div><!-- /.form-group-->
                                                <input type="hidden" value="{{$vieworder->id}}" name="order_id">
                                                 <div class="uk-grid"  data-uk-grid-margin style="margin-top:30px">
                                                  <div class="uk-width-1-1">
                                                     <button type="submit" class="md-btn md-btn-primary">Upload</button>
                                                  </div>
                                                </div>
                                                </form>
                                                   
                                                </div>
                                            </div>


                                       
                                    </div>
                                    <hr class="uk-grid-divider">

                                    <div class="uk-grid">
                                           <h6>Upload Draft</h6>
                                                <div class="uk-width-1-2">
                                                <form method="POST" action="{{URL::route('upload_draft_file')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                   <div class="form-group">
                                                   
                                                    <input type="file" name="name" id="file_name">
                                                    @if ($errors->has('order_file'))
                                                    <span class="help-block">
                                                    <strong><a href="" >{{ $errors->first('order_file') }}</strong>
                                                    </span>
                                                    @endif

                                                
                                                </div><!-- /.form-group-->
                                                <input type="hidden" value="{{$vieworder->id}}" name="order_id">
                                                     <div class="uk-grid"  data-uk-grid-margin style="margin-top:30px">
                                                  <div class="uk-width-1-1">
                                                     <button type="submit" class="md-btn md-btn-primary">Upload</button>
                                                  </div>
                                                </div>
                                                </form>
                                                   
                                                </div>
                                            </div>
                                  
                                </li>
                               

                                <li>
                                  <div class="uk-width-large-7-10">
                        <div class="md-card md-card-single">
                            <div class="md-card-toolbar">
                                <div class="md-card-toolbar-actions hidden-print">
                                    <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                        <i class="md-icon material-icons">&#xE3B7;</i>
                                        <div class="uk-dropdown">
                                            <ul class="uk-nav" id="chat_colors">
                                                <li class="uk-nav-header">Message Colors</li>
                                                <li class="uk-active"><a href="#" data-chat-color="chat_box_colors_a">Grey/Green</a></li>
                                                <li><a href="#" data-chat-color="chat_box_colors_b">Blue/Dark Blue</a></li>
                                                <li><a href="#" data-chat-color="chat_box_colors_c">Orange/Light Gray</a></li>
                                                <li><a href="#" data-chat-color="chat_box_colors_d">Deep Purple/Light Grey</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <i class="md-icon  material-icons">&#xE5CD;</i>
                                </div>
                                <h3 class="md-card-toolbar-heading-text large">
                                    <span class="uk-text-muted">Chat with</span> <a href="#">Lennie Stracke</a>
                                </h3>
                            </div>
                            <div class="md-card-content padding-reset">
                                <div class="chat_box_wrapper">
                                    <div class="chat_box touchscroll chat_box_colors_a" id="chat">
                                        <div class="chat_message_wrapper">
                                            <div class="chat_user_avatar">
                                                <img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/>
                                            </div>
                                            <ul class="chat_message">
                                                <li>
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, eum? </p>
                                                </li>
                                                <li>
                                                    <p> Lorem ipsum dolor sit amet.<span class="chat_message_time">13:38</span> </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="chat_message_wrapper chat_message_right">
                                            <div class="chat_user_avatar">
                                                <img class="md-user-image" src="assets/img/avatars/avatar_03_tn.png" alt=""/>
                                            </div>
                                            <ul class="chat_message">
                                                <li>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus distinctio dolor earum est hic id impedit ipsum minima mollitia natus nulla perspiciatis quae quasi, quis recusandae, saepe, sunt totam.
                                                        <span class="chat_message_time">13:34</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="chat_message_wrapper">
                                            <div class="chat_user_avatar">
                                                <img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/>
                                            </div>
                                            <ul class="chat_message">
                                                <li>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.
                                                        <span class="chat_message_time">23 Jun 1:10am</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="chat_message_wrapper chat_message_right">
                                            <div class="chat_user_avatar">
                                                <img class="md-user-image" src="assets/img/avatars/avatar_03_tn.png" alt=""/>
                                            </div>
                                            <ul class="chat_message">
                                                <li>
                                                    <p> Lorem ipsum dolor sit amet, consectetur. </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        <span class="chat_message_time">Friday 13:34</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chat_submit_box" id="chat_submit_box">
                                        <div class="uk-input-group">
                                            <input type="text" class="md-input" name="submit_message" id="submit_message" placeholder="Send message">
                                            <span class="uk-input-group-addon">
                                                <a href="#"><i class="material-icons md-24">&#xE163;</i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
     </div>
                <div class="uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                         {{Html::Image('admin/images/help.jpg', 'need help?')}}<br>
                            <h2 style="color:orange">(+245)725 709 514</h2>
                        </div>
                    </div>
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
    {!! Html::script('admin/assets/js/pages/forms_file_upload.min.js') !!}
    {!! Html::script('admin/assets/js/pages/page_chat.min.js') !!}
    @stop
