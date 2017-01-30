@extends('layouts.app')
@section('content')

  <div class="v-page-wrap no-top-spacing">
            
            <div class="row fw-row">
                <div class="v-gmap-widget fullscreen-map col-sm-12">
                    <div class="v-wrapper">
                        <!-- Full Width -->
                      
                    </div>
                </div>
            </div>
            
            <div class="v-spacer col-sm-12 v-height-small"></div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="v-comment-form">

                            <div class="v-heading-v2">
                                <h3>Welcome To Avaessays</h3>
                            </div>

                            <p class="pull-bottom-small">
                                We offer 24/7 support
                            </p>


                            <form action="#" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Your name <span class="required">*</span></label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Your email address <span class="required">*</span></label>
                                            <input type="email" value="" maxlength="100" class="form-control" name="email" id="email1">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Website</label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="website" id="website">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Comment <span class="required">*</span></label>
                                            <textarea maxlength="5000" rows="10" class="form-control" name="comment" id="Textarea1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button name="submit" type="submit" id="Button1" class="btn v-btn v-btn-default v-small-button"><i class="fa fa-magic"></i> Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="v-heading-v2">
                            <h3>Address Info</h3>
                        </div>

                        <p>
                            Avaessays Inc<br />
                            1 Nairobi, Kenya
                        </p>
                        <div class="v-heading-v2">
                            <h3>Phone & Email</h3>
                        </div>
                        <p>
                            Email: <a href="#" target="_blank">support@evaessays.com</a><br />
                            Phone: +254 (0) 718 844 831<br />
                            
                        </p>



                        <div class="v-heading-v2">
                            <h3>Find us on</h3>
                        </div>

                        <ul class="social-icons standard circle">
                            <li class="twitter"><a href="http://www.twitter.com/#" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                            <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>

                            <li class="youtube"><a href="#" target="_blank"><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                            <li class="googleplus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>

@endsection