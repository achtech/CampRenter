@extends('frontend.layout.layout',['activePage' => 'home','footerPage' => 'true'])
@section('content')
    <div class="row margin-bottom-90 margin-top-90">
        <div class="col-sm-offset-3 col-md-6">
            {{ Form::open(['route'=>'frontend.client.resetPassword', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="username2">{{trans('front.email_address')}}:
                            <input id="email" name="email" type="email" placeholder="Adresse e-mail"
                                   class="input-text connexion form-control" style="width:99% !important;" required>
                        </label>
                        @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <button style="width:99% !important; font-weight: 700" type="submit"
                            class="button border margin-top-5 connexion"><!---->
                        {{trans('front.reset_password_link')}}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
