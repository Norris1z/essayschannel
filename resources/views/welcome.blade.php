@extends('layouts.app')

@section('content')

  <div id="container">

       
          <div class="row" style="background:url('img/slider/walter.png'); background-size:cover">
            <div class="col-md-6">
                <h1 style="color:#fff; font-size:30px; margin:40px;">Have your academic paper written by a professional writer.</h1>
                <p style="font-size:20px; font-family: 'Open Sans', Arial, Helvetica, sans-serif; margin-left:40px;">Just place an order. Pay only after you</p> 
                <p style="font-size:20px; font-family: 'Open Sans', Arial, Helvetica, sans-serif; margin-left:40px;"> approve the received parts of your paper.</p>

                <a href="{{url('home')}}"><button type="button" class="btn v-btn v-btn-default large turquoise standard dropshadow pull-right" style="margin-top:100px"><span class="text">Place an Order</span></button></a>
            </div>
            <div class="col-md-6">
            @if (Auth::guest())
               

                         <form class="signup" style="margin:30px" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email <span class="required">*</span></label>
                                <input type="email" placeholder="Email" maxlength="100" class="form-control" name="email" id="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password <span class="required">*</span></label>
                                <input type="password" value="" placeholder="Password" maxlength="100" class="form-control" name="password" id="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="remember" type="checkbox">
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 pull-right">
                                    <button type="submit" class="btn v-btn v-btn-default v-small-button no-three-d pull-right no-margin-bottom no-margin-right">Sign In</button>
                                </div>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>

                            <p class="text-center pull-top-small">
                                Don't have an account yet? <a class="v-link" href="/register">Sign Up!</a>
                            </p>
                        </form>

                        @else
                        <img src="img/open.png">
                        <a href="{{url('home')}}"><h3 style="text-align:center; margin-top:50px">My Work Desk>></h3></a>
                        @endif
            </div>
          </div>
       

        <div class="v-page-wrap no-bottom-spacing">

            <div class="container">
                <div class="row">
                    <div class="v-spacer col-sm-12 v-height-mini"></div>
                </div>
            </div>

            <div class="container">

                <div class="row">

                    <div class="v-content-wrapper">

                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="0">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-laptop v-icon"></i>
                                </div>
                                <div class="feature-box-text clearfix">
                                    <h3>Reasonable prices.</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            The price starts from $13.00 per page.
                                        </p>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="200">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-leaf v-icon"></i>
                                </div>
                                <div class="feature-box-text">
                                    <h3>Impeccable quality.</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                
                                    The fulfilled works meet all your demands.<br />
                                        </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="400">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-random v-icon"></i>
                                </div>
                                <div class="feature-box-text">
                                    <h3>Moneyback guarantee.</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                           No questions asked.<br />
                                        </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="v-spacer col-sm-12 v-height-mini"></div>
                </div>
            </div>

            <div class="v-bg-stylish v-bg-stylish-v4 padding-70 no-bottom-padding">
                <div class="container">
                    <div class="row center">

                        <div class="col-sm-12">

                            <div class="avia-social-buttons">
                                <div class="social-container social-container-twitter social-c-1">
                                    <div class="social-hover"></div>
                                    <div class="social-shadow"></div>
                                    <div class="social-overlay"></div>
                                    <div class="social-inner">
                                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="http://platform.twitter.com/widgets/follow_button.1386967771.html#_=1386973141784&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=DevExpress&amp;show_count=true&amp;show_screen_name=false&amp;size=m" class="twitter-follow-button av-load-twitter twitter-follow-button" title="Twitter Follow Button" data-twttr-rendered="true" style="width: 165px; height: 20px;"></iframe>
                                    </div>
                                </div>
                                <div class="social-container social-container-facebook social-c-2">
                                    <div class="social-hover"></div>
                                    <div class="social-shadow"></div>
                                    <div class="social-overlay">
                                    </div>
                                    <div class="social-inner">
                                        <div class="fb-like av-load-facebook fb_edge_widget_with_comment fb_iframe_widget" data-href="http://www.facebook.com/DevExpress" data-layout="button_count" data-send="false" data-show-faces="false" data-width="90" fb-xfbml-state="rendered">
                                            <span style="height: 20px; width: 83px;">
                                                <iframe id="236127776467859" name="f165211848" scrolling="no" title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D28%23cb%3Df971aee%26domain%3Dwww.DevExpress.com%26origin%3Dhttp%253A%252F%252Fwww.DevExpress.com%252Ff69a52bb%26relation%3Dparent.parent&amp;colorscheme=light&amp;extended_social_context=false&amp;href=http%3A%2F%2Fwww.facebook.com%2FDevExpress&amp;layout=button_count&amp;locale=en_US&amp;node_type=link&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=90" style="border: none; overflow: hidden; height: 20px; width: 83px;"></iframe>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <p class="v-smash-text-large">
                                <span>A flawless content that attracts  <strong>attention</strong></span>
                            </p>
                            <div class="horizontal-break"></div>

                           
                        </div>


                        <div class="col-sm-12 pull-top">
                            <img class="img-responsive center-block v-animation" data-animation="fade-from-bottom" data-delay="200" src="img/banner15.png">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-standard"></div>
            </div>

            <div class="container">
                <div class="row center v-counter-wrap">
                    <div class="col-sm-3">
                        <i class="icon-star-1 v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="6218" data-speed="1000" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Line Of Code Written</h6>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <i class="icon-hand-like-2 v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="1448" data-speed="1500" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Cups Of Coffee</h6>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <i class="icon-crown-3 v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="2650" data-speed="2000" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Fineshed Projects</h6>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <i class="icon-screen-1 v-icon icn-holder"></i>
                        <div class="v-counter">
                            <div class="count-number" data-from="0" data-to="5265" data-speed="2500" data-refresh-interval="25"></div>
                            <div class="count-divider"><span></span></div>
                            <h6 class="v-counter-text">Lorem Input Amet</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="v-spacer col-sm-12 v-height-small"></div>
                </div>
            </div>

            <div class="v-parallax v-bg-stylish v-bg-stylish-v4" style="background-image: url(img/slider/slider3.png);">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-8 col-sm-offset-4">
                            <p class="v-smash-text-large">
                                <span>What our professional  <strong>services can offer</strong></span>
                            </p>

                          
                            <div class="v-spacer col-sm-12 v-height-mini"></div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box left-icon-v2 v-animation" data-animation="flip-y" data-delay="200">
                                <i class="fa fa-star-o v-icon icn-holder medium"></i>
                                <div class="feature-box-text">
                                    <h3> ACADEMIC WRITING AND RESEARCH
</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Lorem ipsum dolor sit amet constetur metus elit. Lorem <strong>ipsum dolor</strong> adipiscing sitelit aptent ametosan taciti sociosqu.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box left-icon-v2 v-animation" data-animation="flip-y" data-delay="400">
                                <i class="fa fa-image v-icon icn-holder medium"></i>
                                <div class="feature-box-text">
                                    <h3> ARTICLE AND BLOG WRITING
</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Lorem ipsum dolor sit amet constetur metus elit. Lorem ipsum dolor adipiscing sitelit aptent <strong>ametosan</strong> taciti sociosqu.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="v-spacer col-sm-12 v-height-small"></div>

                    <div class="row">
                        <div class="col-sm-4">

                        </div>

                        <div class="col-sm-4">
                            <div class="feature-box left-icon-v2 v-animation" data-animation="flip-y" data-delay="800">
                                <i class="fa fa-desktop v-icon icn-holder medium"></i>
                                <div class="feature-box-text">
                                    <h3> CREATIVE WRITING</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Lorem ipsum <strong>dolor</strong> sit amet constetur metus elit. Lorem ipsum dolor adipiscing sitelit aptent ametosan taciti sociosqu.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="feature-box left-icon-v2 v-animation" data-animation="flip-y" data-delay="1000">
                                <i class="fa fa-flask v-icon icn-holder medium"></i>
                                <div class="feature-box-text">
                                    <h3> EDITING AND PROOFREADING</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Lorem ipsum dolor sit amet constetur metus elit. <strong>Lorem</strong> ipsum dolor adipiscing sitelit aptent ametosan taciti sociosqu.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="v-spacer col-sm-12 v-height-small"></div>

                    <div class="row">
                        <div class="col-sm-4">

                        </div>

                        <div class="col-sm-4">
                            <div class="feature-box left-icon-v2 v-animation" data-animation="flip-y" data-delay="1400">
                                <i class="fa fa-location-arrow v-icon icn-holder medium"></i>
                                <div class="feature-box-text">
                                    <h3> TECHNICAL WRITING</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Lorem ipsum dolor sit amet constetur metus elit. Lorem <strong>ipsum dolor</strong> adipiscing sitelit aptent ametosan taciti sociosqu.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="feature-box left-icon-v2 v-animation" data-animation="flip-y" data-delay="1600">
                                <i class="fa fa-cloud-download v-icon icn-holder medium"></i>
                                <div class="feature-box-text">
                                    <h3>OTHER</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Lorem ipsum dolor sit amet constetur metus elit. Lorem ipsum dolor <strong>adipiscing</strong> sitelit aptent ametosan taciti sociosqu.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="v-spacer col-sm-12 v-height-small"></div>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <a class="btn v-btn v-second-dark v-animation" data-animation="fade-from-right" data-delay="800" href="#"><i class="fa fa-fire"></i>Place Order Now</a>
                            
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="v-spacer col-sm-12 v-height-big"></div>
                </div>
            </div>




            <div class="container">
                <div class="row">
                    <div class="v-spacer col-sm-12 v-height-standard"></div>
                </div>
            </div>

            <div class="container">

                <div class="row center">
                    <div class="col-sm-12">
                        <p class="v-smash-text-large">
                            <span>What They Says</span>
                        </p>
                        <div class="horizontal-break"></div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-4">
                        <div class="testimonial testimonial-thumb-side v-animation" data-animation="fade-from-bottom" data-delay="0">
                            <div class="testimonial-author">
                                <figure class="featured-thumbnail">
                                    <img src="img/team/team08.jpg">
                                </figure>
                            </div>

                            <div class="wrapper">
                                <div class="excerpt">
                                    Proin fermentum, augue id porttitor condimentum, tellus nisi dapibus est, ultricies
                                    malesuada metus massa a orci. Donec consequat ornare erat, vitae vehicula orci feugiat ac.
                                </div>
                                <div class="user">- Tim Barkley, <span>CEO</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="testimonial testimonial-thumb-side v-animation" data-animation="fade-from-bottom" data-delay="200">
                            <div class="testimonial-author">
                                <figure class="featured-thumbnail">
                                    <img src="img/team/team07.jpg">
                                </figure>
                            </div>

                            <div class="wrapper">
                                <div class="excerpt">
                                    Lorem ipsum dolor sit amet elit, consectetur. Suspendisse viverra
                                    mauris eget tortor imperdiet vehicula. Proin egestas diam ac mauris molestie hendrerit nec nisi tortor.
                                </div>
                                <div class="user">- MIKE CARGILL, <span>CEO</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="testimonial testimonial-thumb-side v-animation" data-animation="fade-from-bottom" data-delay="400">
                            <div class="testimonial-author">
                                <figure class="featured-thumbnail">
                                    <img src="img/team/team06.jpg">
                                </figure>
                            </div>

                            <div class="wrapper">
                                <div class="excerpt">
                                    Proin fermentum, augue id porttitor condimentum, tellus nisi dapibus est, ultricies
                                    malesuada metus massa a orci. Donec consequat ornare erat, vitae vehicula orci feugiat ac.
                                </div>
                                <div class="user">- JOHN DOE, <span>Designer </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="v-spacer col-sm-12 v-height-standard"></div>
                </div>
            </div>


        </div>

       
    </div>

    <!--// BACK TO TOP //-->
    <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>


@endsection