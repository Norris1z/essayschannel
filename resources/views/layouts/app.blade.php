<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Avaessays') }}</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,700,800,900" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="../css/app.css" rel="stylesheet">
    <!-- <link href="/css/all.css" rel="stylesheet"> -->

    <!-- Libs CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/css/streamline-icon.css" rel="stylesheet" />
    <link href="../assets/css/v-nav-menu.css" rel="stylesheet" />
    <link href="../assets/css/v-portfolio.css" rel="stylesheet" />
    <link href="../assets/css/v-blog.css" rel="stylesheet" />
    <link href="../assets/css/v-animation.css" rel="stylesheet" />
    <link href="../assets/css/v-bg-stylish.css" rel="stylesheet" />
    <link href="../assets/css/v-shortcodes.css" rel="stylesheet" />
    <link href="../assets/css/theme-responsive.css" rel="stylesheet" />
    <link href="../assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" />
    <link href="../assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

    <!-- Current Page CSS -->
    <link href="../assets/plugins/rs-plugin/css/settings.css" rel="stylesheet" />
    <link href="../assets/plugins/rs-plugin/css/custom-captions.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>


    <!--Header-->
    <div class="header-container">
       <!--Header Top-->
        <header class="header-top">
            <div class="container">
                <div class="header-top-info">
                    <ul>
                        <li><i class="fa fa-phone"></i>Call us: <strong>0900 123 555</strong> </li>
                        <li><a href="mailto:info@yoursite.com"><i class="fa fa-envelope-o"></i>info@avaessays.com</a> </li>
                    </ul>
                </div>

                <ul class="social-icons standard">
                    <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                    <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>
                    <li class="skype"><a href="#" target="_blank"><i class="fa fa-skype"></i><i class="fa fa-skype"></i></a></li>
                    <li class="googleplus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <nav class="header-top-menu std-menu">
                    <ul class="menu nav-pills nav-main">
                        <li class="m-item"><a href="{{url('contact_us')}}">Help</a></li>
                        <li class="m-item"><a href="{{url('login')}}">Login</a></li>
                        
                    </ul>
                </nav>
            </div>
        </header>
        <!--End Header Top-->
        <header class="header fixed clearfix">

            <div class="container">

                <!--Site Logo-->
                <div class="logo">
                    <a href="{{url('/')}}">
                        <h1>Avaessays</h1>
                    </a>
                </div>
                <!--End Site Logo-->

                <div class="navbar-collapse nav-main-collapse collapse">

                   
                    <!--Main Menu-->
                    <nav class="nav-main mega-menu">
                        <ul class="nav nav-pills nav-main" id="mainMenu">
                        @if (Auth::guest())
                            <li class="dropdown active">
                                <a class="dropdown-toggle" href="{{url('/')}}">Home</a>
                                
                            </li>
                            @else
                            <li class="dropdown active">
                                <a class="dropdown-toggle" href="{{url('home')}}">Dashboard</a>
                                
                            </li>
                            @endif
                            <li class="dropdown mega-menu-item mega-menu-fullwidth">
                                <a class="dropdown-toggle" href="{{url('about_us')}}">About Us</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="{{url('services')}}">Academic Services</a>
                            </li>
                           

                            <li class="dropdown">
                                <a class="dropdown-toggle" href="{{url('contact_us')}}">Contact Us</a>
                            </li>

                        </ul>
                    </nav>
                    <!--End Main Menu-->
                </div>
                <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <span class="v-header-shadow"></span>
        </header>
    </div>
    <!--End Header-->

        @yield('content')

 <!--Footer-Wrap-->
        <div class="footer-wrap footer-v2" id="footer">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <section class="widget">
                                <h1>Avaessays</h1>
                                <p class="pull-bottom-small">
                                    Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.
                                </p>


                                <form id="newsletterForm">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Go!</button>
                                        </span>
                                    </div>
                                </form>
                            </section>
                        </div>

                        <div class="col-sm-3">
                            <section class="widget v-twitter-widget">
                                <div class="v-heading-v2">
                                    <h3>Latest Tweets</h3>
                                </div>
                                <ul class="v-twitter-widget">
                                    <li>
                                        <div class="tweet-text">
                                            <a href="#" target="_blank">@Avaessays</a>
                                            Lorem ipsum dolor sit amet, consec adipiscing elit onvallis dignissim.
                                        </div>
                                        <div class="twitter_intents">
                                            <a class="timestamp" href="#" target="_blank">3 hours ago</a>
                                        </div>
                                    </li>
                                   
                                </ul>
                            </section>
                        </div>

                        <div class="col-sm-3">
                            <div class="v-heading-v2">
                                <h3>Useful Links</h3>
                            </div>
                            <ul class="v-list-v2">
                                <li><i class="fa fa-caret-right"></i><a href="blog-full-width-post.html">Blog Full Width</a></li>
                                <li><i class="fa fa-caret-right"></i><a href="blog-standard-sidebar.html">Blog Large Image</a></li>
                                <li><i class="fa fa-caret-right"></i><a href="blog-mini-sidebar.html">Blog Medium Image</a></li>
                               
                            </ul>

                        </div>

                        <div class="col-sm-3">
                            <section class="widget">
                                <div class="v-heading-v2">
                                    <h3>Contact Us</h3>
                                </div>
                                <div class="footer-contact-info">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-building"></i>Evaessays </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-map-marker"></i>Nairobi, Kenya </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-envelope"></i><strong>Email:</strong> <a href="mailto:support@evaessays.com">support@evaessays.com</a></p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-phone"></i><strong>Phone:</strong> (254) 7 18 844 831</p>
                                        </li>
                                    
                                    </ul>
                                    <br />

                                    <ul class="social-icons standard">
                                        <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                                        <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>
                                        <li class="youtube"><a href="#" target="_blank"><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                                        <li class="googleplus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="copyright">
                <div class="container">
                    <p>© Copyright 2016. All Rights Reserved.</p>
                    <nav class="footer-menu std-menu">
                        <ul class="menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="{{url('contact_us')}}">Contact Us</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--End Footer-Wrap-->
    </div>

    <!--// BACK TO TOP //-->
    <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>

    <!-- Scripts -->
    <script src="../js/app.js"></script>
   <!--  {!! Html::script('js/vendor.js') !!} -->
   
    <!-- Libs -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.flexslider-min.js"></script>
    <script src="../assets/js/jquery.easing.js"></script>
    <script src="../assets/js/jquery.fitvids.js"></script>
    <script src="../assets/js/jquery.carouFredSel.min.js"></script>
    <script src="../assets/js/jquery.validate.js"></script>
    <script src="../assets/js/theme-plugins.js"></script>
    <script src="../assets/js/jquery.isotope.min.js"></script>
    <script src="../assets/js/imagesloaded.js"></script>
    <script src="../assets/js/view.min.js?auto"></script>

    <script src="../assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="../assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <script src="../assets/js/theme-core.js"></script>

</body>
</html>
