@extends('layouts.app')

@section('content')

 <div class="v-page-wrap no-top-spacing">
            <div class="container">
                <div class="row">


                    <div class="v-right-sidebar-nav">

                        <div class="col-sm-3 v-right-sidebar-wrap">
                            <!--Tab-->
                            <ul id="myTab" class="nav v-right-sidebar-inner">
                                <li class="active">
                                    <a href="#common-bootstrap-forms" data-toggle="tab">
                                        <i class="fa fa-briefcase"></i>Place Order
                                    </a>
                                </li>

                                <li class="active">
                                   {{Html::Image('img/satisfaction.png', 'satisfaction guarantee')}}
                                </li>

                               
                            </ul>
                            <!--End Tab-->
                        </div>


                        <div class="col-sm-9 v-sidebar-content-wrap">

                            <div class="tab-content">

                                <div class="tab-pane fade active in" id="common-bootstrap-forms">

                                    <div class="row">
                                        <div class="col-sm-11">

                                            <div class="v-heading-v2">
                                                <h3>Order Details</h3>
                                            </div>

                                            <br />
                                            <form class="form-horizontal form-bordered" method="get">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="inputDefault">Default</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="inputDefault">Default</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>

                                                 <h3 class="v-heading v-center-heading"><span>Personal Details</span></h3>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Vertical Group</label>
                                                    <div class="col-md-9">
                                                        <section class="form-group-vertical">
                                                            <input class="form-control" type="text" placeholder="Username">
                                                            <input class="form-control" type="text" placeholder="Email">
                                                            <input class="form-control last" type="password" placeholder="Password">
                                                        </section>
                                                    </div>
                                                </div>

                                              

                                            </form>

                                        </div>
                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

@endsection