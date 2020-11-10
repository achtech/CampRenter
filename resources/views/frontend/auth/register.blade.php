@extends('frontend.layout.layout',['activePage' => 'home','footerPage' => 'true'])
@section('content')
    <div class="row margin-bottom-30 margin-top-30">
        <div class="col-sm-offset-3 col-md-6">
            <div class="titles-container">
                <h4 class="text-center">{{trans('front.create_an_account')}}</h4>
                <h3 class="text-center">{{trans('front.welcome')}}</h3>
                <h1 class="text-center">{{trans('front.create_an_account')}}</h1>

                <a class="button border margin-top-5 connexion" style="background-color: #ea4435;border-color:#ea4435;  text-align: center;width: 99% !important;" target="popup" href="{{ url('auth/google') }}">
                    <small class="fb-design"> {{trans('front.register_google')}}</small>
                </a>
                <a class="button border margin-top-5 connexion" style="background-color: #36518a;text-align: center;width: 99% !important;" target="popup" href="{{ url('auth/facebook') }}">
                    <small class="fb-design"> {{trans('front.register_facebook')}}</small>
                </a>
                <div class="hr-bar"><span  class="hr-bar-content" >
                            <small>or</small>
                        </span>
                </div>
                <div class="titles-container">
                    <h4 class="text-center">{{trans('front.register_with_email_address')}}</h4>
                    {{ Form::open(['route'=>'frontend.client.store', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
                    <div class="row">
                        <div  class="col-md-12">
                            <label for="username2">
                                {{trans('front.first_name')}}:
                                <input type="text" placeholder="First Name" id="client_name" name="client_name" class="form-control" required>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label  for="username2">
                                {{trans('front.last_name')}}:
                                <input   type="text" placeholder="Last Name" id="client_last_name" name="client_last_name" class="form-control" required>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label  for="username2">
                                {{trans('front.email_add')}}:
                                <input type="text" placeholder="Email Address" id="email" name="email" class="form-control" required>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label>
                                {{trans('front.password')}} : {{trans('front.minimum_length')}}
                            </label>
                        </div>
                        <div class="col-md-12">
                            <input type="password" placeholder="Password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label style="display: flex;"><input style="width: auto;" id="service_terms" name="service_terms"  type="checkbox" class="form-control" required>
                                <span style="margin-top: 12px;">{{trans('front.agree')}} <a  style="font-weight: bold;color: #818181;display: contents;" class="inscription" href="#" id="register" >{{trans('front.service_terms')}}</a>{{trans('front.and')}} <a   style="font-weight: bold;color: #818181;display: contents;" class="inscription" href="#" id="register" >{{trans('front.privacy_policy')}}</a></span>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <button  type="submit" class="button border margin-top-5 connexion" style="font-weight: bold;width: 99% !important;" >
                                {{trans('front.sign_up')}}
                            </button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
@endsection
