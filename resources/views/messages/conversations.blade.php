@extends('layouts.admin2')

@section('content')

    <div id="page_content">
        <div id="page_content_inner">

            <div class="uk-width-medium-8-10 uk-container-center">
                <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
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
                                @if(isset($user))
                                    <span class="uk-text-muted">{{'Chat with ' . @$user->name}}</span> 
                                    @else
                                    <div class="chat-with">No Thread Selected</div>
                                @endif</a>
                                   
                                    
                                </h3>
                            </div>
                            <div class="md-card-content padding-reset">
                                <div class="chat_box_wrapper">
                                    <div class="chat_box touchscroll chat_box_colors_a" id="talkMessages">
                                    @foreach($messages as $message)
                                    @if($message->sender->id == auth()->user()->id)
                                        <div class="chat_message_wrapper">
                                            <div class="chat_user_avatar">
                                               
                                            </div>
                                            <ul class="chat_message">
                                                <li>
                                                    <p> {{$message->message}} </p>
                                                </li>
                                                <li>
                                                <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}" title="Delete Message"><i class="fa fa-close"></i></a>
                                                    <p>{{$message->sender->name}}<span class="chat_message_time">{{$message->humans_time}} ago</span> </p>
                                                </li>
                                            </ul>
                                        </div>
                                        @else
                                        <div class="chat_message_wrapper chat_message_right">
                                            <div class="chat_user_avatar">
                                               
                                            </div>
                                            <ul class="chat_message">
                                                <li>
                                                    <p> {{$message->message}} </p>
                                                </li>
                                                <li>
                                                <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}" title="Delete Message"><i class="fa fa-close"></i></a>
                                                    <p>{{$message->sender->name}}<span class="chat_message_time">{{$message->humans_time}} ago</span> </p>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                      @endif
                                     @endforeach
                                    </div>
                                     <form action="" method="post" id="talkSendMessage">
                                    <div class="chat_submit_box" id="chat_submit_box">

                                    <div class="uk-input-group">
                                   
                                            <input type="text" class="md-input" name="message-data" id="message-data" placeholder="Send message">
                                             <input type="hidden" name="_id" value="{{@request()->route('id')}}">
                                            <span class="uk-input-group-addon">
                                                <button type="submit" href="#"><i class="material-icons md-24">&#xE163;</i></button>
                                            </span>

                                    
                                    </div>
                                        
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="uk-width-large-3-10 uk-visible-large">
                    @if(Auth::user()->hasRole('admin'))
                        <div class="md-list-outside-wrapper">
                            <ul class="md-list md-list-addon md-list-outside" id="chat_user_list">
                            @foreach($threads as $inbox)
                                @if(!is_null($inbox->thread))
                                <li>
                               
                                    <div class="md-card-dropdown md-list-action-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                        <i class="md-icon material-icons">&#xE5D4;</i>
                                        <div class="uk-dropdown uk-dropdown-small">
                                            <ul class="uk-nav">
                                                <li><a href="#">Add to chat</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="md-list-addon-element">
                                        <span class="element-status element-status-success"></span>
                                        
                                    </div>
                                    
                                    <div class="md-list-content">
                                        <a href="{{route('message.read', ['id'=>$inbox->withUser->id])}}">
                                        <span class="md-list-heading">{{$inbox->withUser->name}}</span>
                                        @if(auth()->user()->id == $inbox->thread->sender->id)
                                            <span class="fa fa-reply"></span>
                                        @endif
                                        <span class="uk-text-small uk-text-muted uk-text-truncate">{{substr($inbox->thread->message, 0, 20)}}</span>
                                        </a>
                                    </div>
                                    
                                </li>

                                 @endif
                                @endforeach
                                
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
   

@endsection
@section('page-script')
{!! Html::script('admin/assets/js/pages/page_chat.min.js') !!}

    <script>
        $(function() {
            var $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $body = $('body');

           
            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });


        // toggle boxed layout

            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

        // main menu accordion mode
            if($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function(){
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function(){
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>


@stop
