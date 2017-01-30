@extends('layouts.admin')
@section('content')


<div id="app">
<div id="page_content">
  <div id="page_content_inner">
    @if(Session::has('success_message'))
    <div class="uk-alert uk-alert-success">{!! session('success_message') !!}</div>
    @endif
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
      <div class="uk-width-large-7-10">
        <div class="md-card">
          <div class="user_heading">
          @if(Auth::user()->hasRole('client'))
            <div class="user_heading_menu" data-uk-dropdown="{pos:'left-top'}">
              <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
              <div class="uk-dropdown uk-dropdown-small">
                <ul class="uk-nav">
                
                  <li><a href="{{URL::route('order_edit', $vieworder->id)}}">Edit</a></li>
                
                </ul>
              </div>
            </div>
            @endif
            <div class="user_heading_avatar">
            </div>
            <div class="user_heading_content">
              <h2 class="heading_b uk-margin-bottom">
                <span class="uk-text-truncate">Order # {{$vieworder->id}} </span>
                <span class="sub-heading">Status: <span style="color:orange">{{$vieworder->status}}</span></span>
              </h2>

              <span class="sub-heading">Deadline: {{$deadline}} (Remaining:  {{$remaining}})</span><br><br>
              
            </div>
          </div>
         
          <div class="user_content">
            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
              <li class="uk-active"><a href="#">Order Details</a></li>
               @if(Auth::user()->hasRole('admin'))
              <li><a href="#">Upload Files</a></li>
              @endif
              @if(Auth::user()->hasRole('client'))
              <li><a href="#">Client Upload Files</a></li>
              @endif
              
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
                            <span class="uk-text-muted uk-text-small">Provide sources?</span>
                          </div>
                          <div class="uk-width-large-2-3">
                            <span class="uk-text-large uk-text-middle">{{$vieworder->digital_sources}}</span>
                          </div>
                        </div>
                         <hr class="uk-grid-divider">
                        <div class="uk-grid uk-grid-small">
                          <div class="uk-width-large-1-3">
                            <span class="uk-text-muted uk-text-small">KES ({{$vieworder->client_price}})</span>

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
                      
                           @if(Auth::user()->hasRole('client'))
                              <?php 
                            date_default_timezone_set ("Africa/Nairobi");
                             $tstampNow = $_SERVER['REQUEST_TIME'];
                            ?>
                           <div class="uk-width-medium-1-1">
                              <p>Set New Deadline</p>
                              <form method="POST" action="{{URL::route('set_deadline')}}">
                              {{ csrf_field() }}
                              <div class="form-group">
                              <select id="select_demo_5" name="hours" required data-md-selectize data-md-selectize-bottom>
                              <option value="">Select...</option>
                          
                                    <option value="<?php echo  $tstampNow + 3600 ?>" >1 Hr</option>
                              <option value="<?php echo  $tstampNow + 7200 ?>" >2 Hrs</option>
                              <option value="<?php echo  $tstampNow + 10800 ?>" >3 Hrs</option>
                              <option value="<?php echo  $tstampNow + 14400 ?>" >4 Hrs</option>
                                <option value="<?php echo  $tstampNow + 18000 ?>" >5 Hrs</option>
                              <option value="<?php echo  $tstampNow + 21600 ?>" >6 Hrs</option>
                                <option value="<?php echo  $tstampNow + 25200 ?>" >7 Hrs</option>
                              <option value="<?php echo  $tstampNow + 28800 ?>" >8 Hrs</option>
                              <option value="<?php echo  $tstampNow + 32400 ?>" >9 Hrs</option>
                              <option value="<?php echo  $tstampNow + 36000 ?>" >10 Hrs</option>
                              <option value="<?php echo  $tstampNow + 39600 ?>" >11 Hrs</option>
                              <option value="<?php echo  $tstampNow + 43200 ?>" >12 Hrs</option>
                              <option value="<?php echo  $tstampNow + 46800 ?>" >13 Hrs</option>
                              <option value="<?php echo  $tstampNow + 50400 ?>" >14 Hrs</option>
                              <option value="<?php echo  $tstampNow + 54000 ?>" >15 Hrs</option>
                              <option value="<?php echo  $tstampNow + 57600 ?>" >16 Hrs</option>
                              <option value="<?php echo  $tstampNow + 61200 ?>" >17 Hrs</option>
                              <option value="<?php echo  $tstampNow + 64800 ?>" >18 Hrs</option>
                              <option value="<?php echo  $tstampNow + 68400 ?>" >19 Hrs</option>
                              <option value="<?php echo  $tstampNow + 72000 ?>" >20 Hrs</option>
                              <option value="<?php echo  $tstampNow + 75600 ?>" >21 Hrs</option>
                              <option value="<?php echo  $tstampNow + 79200 ?>" >22 Hrs</option>
                              <option value="<?php echo  $tstampNow + 82800 ?>" >23 Hrs</option>
                              <option value="<?php echo  $tstampNow + 86400 ?>" >24 Hrs</option>
                              <option value="<?php echo  $tstampNow + 90000 ?>" >25 Hrs</option>
                              <option value="<?php echo  $tstampNow + 93600 ?>" >26 Hrs</option>
                              <option value="<?php echo  $tstampNow + 97200 ?>" >27 Hrs</option>
                              <option value="<?php echo  $tstampNow + 100800 ?>" >28 Hrs</option>
                              <option value="<?php echo  $tstampNow + 104400 ?>" >29 Hrs</option>
                              <option value="<?php echo  $tstampNow + 108000 ?>">30 Hrs</option>
                              <option value="<?php echo  $tstampNow + 111600 ?>">31 Hrs</option>
                              <option value="<?php echo  $tstampNow + 115200 ?>">32 Hrs</option>
                              <option value="<?php echo  $tstampNow + 118800 ?>">33 Hrs</option>
                              <option value="<?php echo  $tstampNow + 122400 ?>">34 Hrs</option>
                              <option value="<?php echo  $tstampNow + 126000 ?>">35 Hrs</option>
                              <option value="<?php echo  $tstampNow + 129600 ?>">36 Hrs</option>
                              <option value="<?php echo  $tstampNow + 133200 ?>">37 Hrs</option>
                              <option value="<?php echo  $tstampNow + 136800 ?>">38 Hrs</option>
                              <option value="<?php echo  $tstampNow + 140400 ?>">39 Hrs</option>
                              <option value="<?php echo  $tstampNow + 144000 ?>">40 Hrs</option>
                              <option value="<?php echo  $tstampNow + 147600 ?>">41 Hrs</option>
                              <option value="<?php echo  $tstampNow + 151200 ?>">42 Hrs</option>
                              <option value="<?php echo  $tstampNow + 154800 ?>">43 Hrs</option>
                              <option value="<?php echo  $tstampNow + 158400 ?>">44 Hrs</option>
                              <option value="<?php echo  $tstampNow + 162000 ?>">45 Hrs</option>
                              <option value="<?php echo  $tstampNow + 165600 ?>">46 Hrs</option>
                              <option value="<?php echo  $tstampNow + 169200 ?>">47 Hrs</option>
                              <option value="<?php echo  $tstampNow + 172800 ?>">48 Hrs</option>
                                    <option value="<?php echo  $tstampNow + 176400 ?>" >49 Hr</option>
                              <option value="<?php echo  $tstampNow + 180000 ?>" >50 Hrs</option>
                              <option value="<?php echo  $tstampNow + 183600 ?>" >51 Hrs</option>
                              <option value="<?php echo  $tstampNow + 187200 ?>" >52 Hrs</option>
                              <option value="<?php echo  $tstampNow + 190800 ?>" >53 Hrs</option>
                                    <option value="<?php echo  $tstampNow + 194400 ?>" >54 Hrs</option>
                              <option value="<?php echo  $tstampNow + 198000 ?>" >55 Hrs</option>
                              <option value="<?php echo  $tstampNow + 201600 ?>" >56 Hrs</option>
                              <option value="<?php echo  $tstampNow + 205200 ?>" >57 Hrs</option>
                              <option value="<?php echo  $tstampNow + 208800 ?>" >58 Hrs</option>
                              <option value="<?php echo  $tstampNow + 212400 ?>" >59 Hrs</option>
                              <option value="<?php echo  $tstampNow + 216000 ?>" >60 Hrs</option>
                              <option value="<?php echo  $tstampNow + 219600 ?>" >61 Hrs</option>
                              <option value="<?php echo  $tstampNow + 223200 ?>" >62 Hrs</option>
                              <option value="<?php echo  $tstampNow + 226800 ?>" >63 Hrs</option>
                              <option value="<?php echo  $tstampNow + 230400 ?>" >64 Hrs</option>
                              <option value="<?php echo  $tstampNow + 234000 ?>" >65 Hrs</option>
                              <option value="<?php echo  $tstampNow + 237600 ?>" >66 Hrs</option>
                              <option value="<?php echo  $tstampNow + 241200 ?>" >67 Hrs</option>
                              <option value="<?php echo  $tstampNow + 244800 ?>" >68 Hrs</option>
                              <option value="<?php echo  $tstampNow + 248400 ?>" >69 Hrs</option>
                              <option value="<?php echo  $tstampNow + 252000 ?>" >70 Hrs</option>
                              <option value="<?php echo  $tstampNow + 255600 ?>" >71 Hrs</option>
                              <option value="<?php echo  $tstampNow + 259200 ?>" >72 Hrs</option>
                              </select>
                              </div>
                              <input type="hidden" value="{{$vieworder->id}}" name="order_id">
                              <div class="uk-grid"  data-uk-grid-margin style="margin-top:30px">
                              <div class="uk-width-1-1">
                              <button type="submit" class="md-btn md-btn-primary">Set Deadline</button>
                              </div>
                              </div>
                              </form>
                              </div>
                              <hr>
                           
                           
                        @endif
                       
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
              @if(Auth::user()->hasRole('client'))
              <li>
                <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                  <div class="uk-grid">
                    <h6>Upload  Files</h6>
                    <div class="uk-width-1-2">
                      <form method="POST" action="{{URL::route('upload_complete_file')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="file" name="name" id="file_name">
                          @if ($errors->has('order_file'))
                          <span class="help-block">
                            <strong>
                              <a href="" >
                                {{ $errors->first('order_file') }}
                            </strong>
                          </span>
                          @endif
                        </div>
                        <!-- /.form-group-->
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
                 <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                <div class="uk-grid">
                
                </div>
                </div>
              </li>
              @endif
              @if(Auth::user()->hasRole('admin'))
              <li>
                <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
                  <div class="uk-grid">
                    <h6>Upload completed Work</h6>
                    <div class="uk-width-1-2">
                      <form method="POST" action="{{URL::route('upload_complete')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="file" name="name" id="file_name">
                          @if ($errors->has('order_file'))
                          <span class="help-block">
                            <strong>
                              <a href="" >
                                {{ $errors->first('order_file') }}
                            </strong>
                          </span>
                          @endif
                        </div>
                        <!-- /.form-group-->
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
                 <div id="user_profile_gallery" data-uk-check-display class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid="{gutter: 4}">
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
                </div>
              </li>
              @endif
            
            </ul>
          </div>
        </div>
      </div>
      <div class="uk-width-large-3-10">
        <div class="md-card">
          <div class="md-card-content">
            {{Html::Image('admin/images/icon.png', 'need help?')}}<br>
            {{Html::Image('admin/images/cont.gif', 'need help?')}}<br>
            <h2 style="color:orange">(+245)718 844 831</h2>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('page-script')

<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
       
@stop