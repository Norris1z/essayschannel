@extends('layouts.app')

@section('content')
<div class="v-page-heading v-bg-stylish v-bg-stylish-v1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-text">
                            <h1 class="entry-title">Sign Up</h1>
                        </div>

                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Sign Up</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="padding-100 body-sign">

            <div class="container">
                <div class="row">


                    <div class="col-sm-5 col-sm-offset-1">

                        <p class="v-smash-text-large pull-top">
                            <span>Why we are the best</span>
                        </p>
                        <div class="horizontal-break left"></div>

                        <ul class="v-list-v2">
                            <li class="v-animation" data-animation="fade-from-right" data-delay="150"><i class="fa fa-check"></i><span class="v-lead">Moneyback is guaranteed. We deliver the written paper you need or refund you in full..</span></li>
                            <li class="v-animation" data-animation="fade-from-right" data-delay="300"><i class="fa fa-check"></i><span class="v-lead">Plagiarism is forbidden in the walls of the academic company. We possess a wide range of antiplagiarism programs that are aimed at detecting and avoiding plagiarized parts of the text.</span></li>
                            <li class="v-animation" data-animation="fade-from-right" data-delay="450"><i class="fa fa-check"></i><span class="v-lead">You have a total control over your order and make additional comments, suggestions, etc..</span></li>
                            <li class="v-animation" data-animation="fade-from-right" data-delay="600"><i class="fa fa-check"></i><span class="v-lead">Quality papers is the priority!.</span></li>
                           
                        </ul>
                    </div>

                    <div class="col-sm-5">

                        <form class="signup" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name <span class="required">*</span></label>
                                <input type="text" value="" placeholder="Name" maxlength="100" class="form-control" name="name" id="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>E-mail Address <span class="required">*</span></label>
                                <input type="text" value="" placeholder="E-mail Address" maxlength="100" class="form-control" name="email" id="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Password</label>
                                        <input name="password" type="password" placeholder="Password" class="form-control input-lg" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Password Confirm</label>
                                        <input placeholder="Password Confirm" type="password" class="form-control input-lg" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               
                                <div class="col-sm-4 pull-right">
                                    <button type="submit" class="btn v-btn v-btn-default v-small-button no-three-d pull-right no-margin-bottom no-margin-right">Sign Up</button>
                                </div>
                            </div>

                           


                            <p class="text-center pull-top-small">
                                Already Registered? <a href="{{url('/') }}">Sign In</a>
                            </p>
                        </form>
                    </div>

                </div>
            </div>

        </div>

@endsection
