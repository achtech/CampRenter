<div class="create-compte">
    {{trans('front.create_account')}}<a class="inscription" href="#" id="register" style="font-weight: bold !important;color: #818181 !important;"  >{{trans('front.register')}}</a>
    <div id="registerModel" class="modal">
        <div class="modal-content" style="background: #f4f4f4;margin-top: 82px;">
            <span class="close-second-model close-btn">&times;</span>
            <div class="titles-container">
                <h4 class="text-center">{{trans('front.create_an_account')}}</h4>
                <h3 class="text-center">{{trans('front.welcome')}}</h3>
                <br/>
                <div id="signUpRequirments" style="display:none;">
                    <ul >
                        <li >
                            <strong >{{trans('front.email')}}</strong>
                            <ul >
                                <li >
                                    <span >{{trans('front.email_address_already_used')}}</span>
                                </li>
                            </ul>
                        </li>
                        <li >
                            <strong >{{trans('front.password')}}</strong>
                            <ul >
                                <li >
                                    <strong >{{trans('front.password_requirment')}}</strong>
                                    <ul >
                                        <li >
                                            <span >{{trans('front.capital_required')}}</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <strong >{{trans('front.terms_required')}}</strong>
                            <ul >
                                <li >
                                    <span >{{trans('front.mandatory_fields')}}</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div>
                    <button id="registrationEmail" class="button border margin-top-5 connexion" style="width: 98% !important;font-weight: 700;">
                        {{trans('front.register_email_address')}}
                    </button>

                    <div id="registerWithEmail" class="modal">
                        <div class="modal-content" style="background: #f4f4f4;margin-top: 82px;">
                            <div class="controls">
                                <a class="control-left"><i class="fa fa-angle-left icons-design go-back"></i></a>
                                <span class="close-third-model close-btn">&times;</span>
                            </div>
                            <div class="titles-container">
                                <h1 class="text-center">{{trans('front.create_an_account')}}</h1>
                                <h4 class="text-center">{{trans('front.register_with_email_address')}}</h4>
                                {{ Form::open(['route'=>'frontend.client.store', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
                                @csrf
                                <div class="row">
                                        <div  class="col-md-12">
                                            <label for="username2">
                                                {{trans('front.first_name')}}:
                                                <input type="text" placeholder="First Name" id="client_name" name="client_name" class="form-control" value="{{ old('client_name') }}" required>
                                            </label>
                                        </div>
                                    <div class="col-md-12">
                                        <label  for="username2">
                                            {{trans('front.last_name')}}:
                                            <input   type="text" placeholder="Last Name" id="client_last_name" name="client_last_name" class="form-control" value="{{ old('client_last_name') }}" required>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                    <label  for="username2">
                                        {{trans('front.email_add')}}:
                                        <input type="email" placeholder="Email Address" id="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" required >
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label>
                                        {{trans('front.password')}} : {{trans('front.minimum_length')}}
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control  @error('password') is-invalid @enderror" required>
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

                </div>	</div>
                    <div class="hr-bar">
                        <span  class="hr-bar-content" >
                            <small>or</small>
                        </span>
                    </div>

                    <a class="btn btn-primary border margin-top-5 connexion with-facebook" style="color: white !important;text-align: center;height: 40px;width: 98% !important;"  target="popup"  href="{{ url('auth/facebook') }}">
                      <small class="fb-design"> {{trans('front.register_facebook')}}</small>
                    </a>
                    <br/><br/><br/>
            </div>
           <!-- <div class="create-compte" style="bottom: -19px;position: relative;">
                {{trans('front.existed_account')}}<a  style="font-weight: bold;color: #818181;" class="inscription"  href="#" id="log" >{{trans('front.to_connect')}}</a>
            </div>-->
            </div>


    </div>

</div>
</div>
