<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
      <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Dashboard</title>
    
    
    <link rel="stylesheet" href="{{asset('chat/css/reset.css')}}">

      {!! Html::style('admin/bower_components/kendo-ui/styles/kendo.common-material.min.css') !!}
      {!! Html::style('admin/bower_components/kendo-ui/styles/kendo.material.min.css') !!}
      {!! Html::style('admin/bower_components/uikit/css/uikit.almost-flat.min.css') !!}
      {!! Html::style('admin/assets/icons/flags/flags.min.css') !!}
      {!! Html::style('admin/assets/css/main.min.css') !!}
      {!! Html::style('admin/assets/css/themes/themes_combined.min.css') !!}
      {!! Html::style('admin/css/custom.css') !!}

 <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
  </head>

  <body class="sidebar_main_open sidebar_main_swipe header_double_height">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                
                    <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
                        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                            <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                            <div class="uk-dropdown uk-dropdown-width-3">
                                <div class="uk-grid uk-dropdown-grid">
                                    <div class="uk-width-2-3">
                                        <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-bottom uk-text-center">
                                            <a href="page_mailbox.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-light-green-600">&#xE158;</i>
                                                <span class="uk-text-muted uk-display-block">Mailbox</span>
                                            </a>
                                            <a href="page_invoices.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-purple-600">&#xE53E;</i>
                                                <span class="uk-text-muted uk-display-block">Invoices</span>
                                            </a>
                                            <a href="page_chat.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-cyan-600">&#xE0B9;</i>
                                                <span class="uk-text-muted uk-display-block">Chat</span>
                                            </a>
                                            <a href="page_scrum_board.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-red-600">&#xE85C;</i>
                                                <span class="uk-text-muted uk-display-block">Scrum Board</span>
                                            </a>
                                            <a href="page_snippets.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-blue-600">&#xE86F;</i>
                                                <span class="uk-text-muted uk-display-block">Snippets</span>
                                            </a>
                                            <a href="page_user_profile.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                                <span class="uk-text-muted uk-display-block">User profile</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                                            <li class="uk-nav-header">Components</li>
                                            <li><a href="components_accordion.html">Accordions</a></li>
                                            <li><a href="components_buttons.html">Buttons</a></li>
                                            <li><a href="components_notifications.html">Notifications</a></li>
                                            <li><a href="components_sortable.html">Sortable</a></li>
                                            <li><a href="components_tabs.html">Tabs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">16</span></a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan">sm</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Earum totam.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Et aperiam maxime unde dolorum repellendus.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Quisquam ut deleniti.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Rerum similique qui deserunt illum voluptatibus ut voluptate.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-light-green">xp</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Hic rerum.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Cupiditate sit excepturi eos molestias quos earum vel eos sunt quasi.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Quia ea.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Minima molestiae aut dolore est aspernatur in.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Nesciunt ipsa.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Dignissimos autem perferendis dolores voluptatem doloremque velit.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Et repellendus.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Accusamus quisquam molestias beatae et tempore.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Facilis voluptas nemo.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Dolorem exercitationem aliquid dolorem vel nam ut.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Excepturi minus.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Tempora voluptatibus delectus voluptatem eligendi dicta.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">At cupiditate ullam.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Et aut odio optio quam minus quia quos.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="page_user_profile.html">My profile</a></li>
                                    <li><a href="page_settings.html">Settings</a></li>
                                    <li> <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
              <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                  @{{~items}}
                  <li data-value="@{{ $item.value }}">
                      <a href="@{{ $item.url }}">
                          @{{ $item.value }}<br>
                          <span class="uk-text-muted uk-text-small">@{{{ $item.text }}}</span>
                      </a>
                  </li>
                  @{{/items}}
              </ul>
            </script>
            </form>
        </div>
    </header>
      
        <!-- main sidebar -->
      <aside id="sidebar_main">
        <div class="sidebar_main_header">
          <div class="sidebar_logo">
          @if(Auth::user()->hasRole('admin'))
            <a href="{{url('/home')}}" class="sSidebar_hide sidebar_logo_large" style="font-size:20px; font-family:Impact, Charcoal, sans-serif; color:#009688">
            Welcome {{Auth::user()->name}}
            <!-- <img class="logo_light" src="assets/img/logo_main_white.png" alt="" height="15" width="71"/> -->
            </a>
           @endif
            @if(Auth::user()->hasRole('client'))
            <a href="{{url('/home')}}" class="sSidebar_hide sidebar_logo_large" style="font-size:20px; font-family:Impact, Charcoal, sans-serif; color:#009688">
            Welcome {{Auth::user()->name}}
            <!-- <img class="logo_light" src="assets/img/logo_main_white.png" alt="" height="15" width="71"/> -->
            </a>
           @endif
          </div>
        
        </div>
        <div class="menu_section">
          <ul>
          @if(Auth::user()->hasRole('admin'))
            <li class="current_section" title="Dashboard">
              <a href="{{url('home')}}">
              <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
              <span class="menu_title">Dashboard</span>
              </a>
            </li>

              <li title="Available Orders">
              <a href="{{URL::route('home')}}">
              <span class="menu_icon"><i class="uk-icon-file md-48 uk-text-success"></i></span>
              <span class="menu_title">Available Orders (<span style="color:orange">{{$count_available_orders}}</span>)</span>
              </a>
            
            </li> 

          

            <li title="Unpaid">
              <a href="{{URL::route('pending_orders')}}">
              <span class="menu_icon"><i class="uk-icon-file-o md-48 uk-text-success"></i></span>
              <span class="menu_title">Unpaid Orders</span>
              </a>
            
            </li>
            

            <li title="Users">
              <a href="{{url('chats')}}">
              <span class="menu_icon"><i class="uk-icon-file-o md-48 uk-text-success"></i></span>
              <span class="menu_title">User Chats</span>
              </a>
            
            </li>

         
            <li title="Layout">
              <a href="{{URL::route('completed')}}">
              <span class="menu_icon"><i class="uk-icon-hand-stop-o md-48 uk-text-success"></i></span>
              <span class="menu_title">Completed (<span style="color:orange">{{$count_completed}}</span>)</span>
              </a>
            
            </li>
  
            <hr>
            
            @endif
            @if(Auth::user()->hasRole('client'))
             <li class="current_section" title="Dashboard">
              <a href="{{url('/home')}}">
              <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
              <span class="menu_title">Dashboard</span>
              </a>
            </li>

             <li title="Create New Order">
              <a href="{{URL::route('new_order')}}">
              <span class="menu_icon"><i class="uk-icon-arrow-circle-right md-48 uk-text-success"></i></span>
              <span class="menu_title">Create New Order</span>
              </a>
            </li>

            <li title="Available Orders">
              <a href="{{URL::route('home')}}">
              <span class="menu_icon"><i class="material-icons">&#xE8F1;</i></span>
              <span class="menu_title">My Orders (<span style="color:orange">{{$count_available_orders}}</span>)</span>
              </a>
            
            </li> 
            
          
               <li title="Unpaid">
              <a href="{{URL::route('pending_orders')}}">
              <span class="menu_icon"><i class="uk-icon-file-o md-48 uk-text-success"></i></span>
              <span class="menu_title">Unpaid Orders</span>
              </a>
            
            </li>
            
          
            <li title="Layout">
              <a href="{{URL::route('completed')}}">
              <span class="menu_icon"><i class="uk-icon-hand-stop-o md-48 uk-text-success"></i></span>
              <span class="menu_title">Completed (<span style="color:orange">{{$count_completed}}</span>)</span>
              </a>
            
            </li>
            

            @endif
         
          
         
          </ul>
        </div>
      </aside>

   @yield('content')
   
     <footer id="footer">
        &copy; 2016 <a href="#">Avaessays</a>, All rights reserved.
     </footer>



      <script>
          var __baseUrl = "{{url('/')}}"
      </script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>
        <script src="/js/app.js"></script>
         @yield('page-script')
         

  </body>
</html>
