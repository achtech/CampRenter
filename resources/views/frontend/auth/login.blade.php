@extends('frontend.layout.layout',['activePage' => 'home','footerPage' => 'true'])
@section('content')
    <div class="row margin-bottom-90" style="width:99%;">
        <div class="col-sm-offset-3 col-md-6">
            {{ Form::open(['url'=>'login/client', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
            <div class="row" style="padding-left:5%;">
                <h2 style="margin-bottom:4%; text-align: center;"><strong>{{trans('front.menu_login')}}</strong><h2>

                <div class="col-md-12">
                    <label style="display: inline;" for="username2">{{trans('front.email_address')}}:
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        style="@error('email') border-color: #ff4f70; margin-bottom:0%; @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </label>

                    @error('email')
                    <span class="invalid-feedback" role="alert" style="width: 100%;font-size: 50%;color: #ff4f70;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="password1">{{trans('front.password')}}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    style="@error('password') border-color: #ff4f70; margin-bottom:0%; @enderror"
                           name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert" style="width: 100%;margin-top: 0.25rem;font-size: 50%;color: #ff4f70;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <button type="submit" class="button border margin-top-5 connexion"
                            style="font-weight: bold; width:99% !important;">
                        {{trans('front.to_connect')}}
                    </button>
                </div>
            {{ Form::close() }}
        </div>

          <div style="padding-top: 10px;text-align: center;">
              <a href="{{ route('frontend.client.showresetpassword') }}" style="margin-top: 90px">
                  {{ __('Forgot Your Password?') }}
              </a>
          </div>
        <div class="row" style="padding-left:5%;">
            <div class="col-md-12">
                <div class="hr-bar">
                    <span class="hr-bar-content" style="color: rgb(204, 204, 204);">
                        <small>{{trans('front.or')}}</small>
                    </span>
                </div>
                <a class="button margin-top-5 connexion with-facebook"
                style="width:99% !important; text-align: center;background-color: #36518a;" target="popup"
                href="{{ url('redirect/facebook') }}">
                    <small class="fb-design"> {{trans('front.facebook_connexion')}}</small>
                </a>
                <a class="button margin-top-5 connexion with-facebook"
                style="width:99% !important; text-align: center;background-color: #e90746;" target="popup"
                href="{{ url('redirect/google') }}">
                    <small class="fb-design"> {{trans('front.google_connexion')}}</small>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
