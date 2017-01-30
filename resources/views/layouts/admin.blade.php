<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
      <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Dashboard</title>
  

      {!! Html::style('admin/bower_components/kendo-ui/styles/kendo.common-material.min.css') !!}
      {!! Html::style('admin/bower_components/kendo-ui/styles/kendo.material.min.css') !!}
      {!! Html::style('admin/bower_components/uikit/css/uikit.almost-flat.min.css') !!}
      {!! Html::style('admin/assets/icons/flags/flags.min.css') !!}
      {!! Html::style('admin/assets/css/main.min.css') !!}
      {!! Html::style('admin/assets/css/themes/themes_combined.min.css') !!}
      {!! Html::style('admin/assets/css/custom.css') !!}

    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

 <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

  </head>

  <body class="sidebar_main_open sidebar_main_swipe">
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
            
            <div class="uk-navbar-flip">
              <ul class="uk-navbar-nav user_actions">
                <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i>



                <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}"><i class="uk-icon-caret-down uk-text-warning"></i>
                  
                  <div class="uk-dropdown uk-dropdown-small">
                    <ul class="uk-nav js-uk-prevent">
                      <li><a href="">My profile</a></li>
                    
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
      <!-- main header end -->
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
              <a href="{{url('/home')}}">
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

        

        <!--      <li title="Users">
              <a href="{{url('chats')}}">
              <span class="menu_icon"><i class="uk-icon-file-o md-48 uk-text-success"></i></span>
              <span class="menu_title">User Chats</span>
              </a>
            
            </li> -->

             <li title="Users">
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
           

        
                    

            <hr>
            
            @endif
            @if(Auth::user()->hasRole('client'))
             <li class="current_section" title="Dashboard">
              <a href="{{url('home')}}">
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
        
          
             <hr>
            <li title="Layout">
              <a href="{{URL::route('completed')}}">
              <span class="menu_icon"><i class="uk-icon-hand-stop-o md-48 uk-text-success"></i></span>
              <span class="menu_title">Completed (<span style="color:orange">{{$count_completed}}</span>)</span>
              </a>
            
            </li>

               <!-- <li title="Users">
              <a href="{{url('chats')}}">
              <span class="menu_icon"><i class="uk-icon-file-o md-48 uk-text-success"></i></span>
              <span class="menu_title">User Chats</span>
              </a>
            
            </li> -->


             <li title="Unpaid">
              <a href="{{URL::route('pending_orders')}}">
              <span class="menu_icon"><i class="uk-icon-file-o md-48 uk-text-success"></i></span>
              <span class="menu_title">Unpaid Orders</span>
              </a>
            
            </li>
            

            @endif
         
          
         
          </ul>
        </div>
      </aside>
      <!-- main sidebar end -->
   

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

        
        <script src="js/app.js"></script>

        

        {!! Html::script('admin/assets/js/common.min.js') !!}
        {!! Html::script('admin/assets/js/uikit_custom.min.js') !!}
        {!! Html::script('admin/assets/js/altair_admin_common.min.js') !!}
        {!! Html::script('admin/bower_components/d3/d3.min.js') !!}
        {!! Html::script('admin/bower_components/peity/jquery.peity.min.js') !!}
        {!! Html::script('admin/bower_components/countUp.js/dist/countUp.min.js') !!}
        {!! Html::script('admin/bower_components/handlebars/handlebars.min.js') !!}
        {!! Html::script('admin/assets/js/custom/handlebars_helpers.min.js') !!}
        {!! Html::script('admin/bower_components/clndr/clndr.min.js') !!}
        {!! Html::script('admin/bower_components/fitvids/jquery.fitvids.js') !!}
        {!! Html::script('admin/bower_components/datatables/media/js/jquery.dataTables.min.js') !!}
        {!! Html::script('admin/bower_components/datatables-colvis/js/dataTables.colVis.js') !!}

        {!! Html::script('admin/bower_components/datatables-tabletools/js/dataTables.tableTools.js') !!}

        {!! Html::script('admin/assets/js/custom/datatables_uikit.min.js') !!}
        {!! Html::script('admin/assets/js/pages/plugins_datatables.min.js') !!}

        {!! Html::script('admin/assets/js/pages/forms_file_upload.min.js') !!}
       
         @yield('page-script')


  </body>
</html>
