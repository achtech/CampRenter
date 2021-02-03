<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="background: #f4f4f4;">
        <span class="close close-btn">&times;</span>
        <header class="modal-header">
            <div class="controls"><!---->
                 <a  href="#" class="control-right">
                    </a>
                </div>
                <div  class="titles-container">
                    <h3 class="text-center">{{trans('front.to_connect')}}</h3>
                </div>
        </header>
        <div class="modal-body">
                <div style="width: 152%;">
                    {{ Form::open(['url'=>'login/client', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
                    <div class="row">
                    <div  class="col-md-12">
                            <label for="username2">{{trans('front.email_address')}}:
                             <input id="email" name="email" type="email" placeholder="Adresse e-mail" class="input-text connexion form-control" >
                            </label>
                        </div>

                        <div  class="col-md-12">
                            <label for="password1">{{trans('front.password')}}</label>
                            <input id="password" name="password" type="password" placeholder="Password"  class="input-text connexion" >
                        </div>
                        <div class="col-md-12">
                            <button type="submit"  class="button border margin-top-5 connexion">
                                {{trans('front.to_connect')}}
                            </button>
                        </div>
                    </div>
                        {{ Form::close() }}
                        <a style="font-weight: bold;color: #818181;" id="forget-password"><small >{{trans('front.forget_password')}}</small></a>
                        <div id="passwordModel" class="modal">
                            <div class="modal-content" style="background: #f4f4f4;margin-top: 82px;">
                                <span class="close-forget-password-model close-btn">&times;</span>

                            <div class="titles-container"><h3 class="text-center">{{trans('front.to_connect')}}</h3></div>
                            {{ Form::open(['route'=>'frontend.client.resetPassword', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="username2">{{trans('front.email_address')}}:
                                                <input id="email" name="email" type="email" placeholder="Adresse e-mail" class="input-text connexion form-control" style="width:99% !important;" required>
                                            </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button style="width:99% !important; font-weight: 700" type="submit" class="button border margin-top-5 connexion"><!---->
                                            {{trans('front.reset_password_link')}}
                                    </button>
                                </div>
                            </div>
                            {{ Form::close() }}
                                                                            <div>
                                    <a style="font-weight: bold;color: #818181;" id="log_in">{{trans('front.want_to_log')}}</a>
                                </div>
                                <div class="create-compte" style="bottom: -18px;position: relative;">
                                    {{trans('front.create_account')}}<a style="font-weight: bold;color: #818181;" class="inscription" href="#" id="registerAfterForgotPassword">{{trans('front.register')}}</a>

                                </div>
                            </div>
                        </div>

                        <div class="hr-bar w-727">
                            <span  class="hr-bar-content" style="color: rgb(204, 204, 204);">
                                <small >{{trans('front.or')}}</small>
                            </span>
                        </div>
                        <a class="btn btn-primary border margin-top-5 connexion with-facebook" style="color: white !important;text-align: center;height: 40px;"  target="popup"  href="{{ url('auth/facebook') }}">
                            <small class="fb-design"> {{trans('front.facebook_connexion')}}</small>
                        </a>

                </div>
        </div>
        <br/>
        @include('frontend.connexion.register');

</div>
