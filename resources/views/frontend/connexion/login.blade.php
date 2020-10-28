<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="background: #f4f4f4;">
        <span class="close">&times;</span>
        <header class="modal-header">
            <div class="controls"><!---->
                 <a  href="#" class="control-right">
                    </a>
                </div> 
                <div  class="titles-container">
                    <h3 class="text-center">{{trans('front.to_connect')}}</h3></div>
        </header>
        <div class="modal-body">
                <div class="container">
                    {{ Form::open(['action'=>'App\Http\Controllers\frontend\FClientController@resetPassword', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
                    
                        <div  class="form-group">
                            <label class="sr-only">
                                {{trans('front.email_address')}}
                              </label>
                            <input id="email" name="email" type="text" placeholder="Adresse e-mail" autocomplete="username" class="login-username form-control" style="width:727px !important;">
                        </div>
                        <div  class="form-group">
                            <label class="sr-only">
                                {{trans('front.password')}}
                              </label>
                            <input id="password" name="password" type="password" placeholder="Adresse e-mail" autocomplete="username" class="login-username form-control" style="width:727px !important;">
                        </div>
                        <div >
                            <button type="button" class="btn btn-primary btn-block w-727 connexion">
                                {{trans('front.to_connect')}}
                            </button>
                        </div>
                        <a style="color: #f15424;" id="forget-password"><small >{{trans('front.forget_password')}}</small></a>
                        <div id="passwordModel" class="modal">
                            <div class="modal-content" style="background: #f4f4f4;margin-top: 82px;">
                                <span class="close-forget-password-model">&times;</span>
                            
                            <div class="titles-container"><h3 class="text-center">{{trans('front.to_connect')}}</h3></div>
                            
                            {{ Form::open(['route'=>'frontend.client.resetPassword', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
                                    <div class="form-group"><label  class="sr-only">
                                        {{trans('front.email_address')}}
                                      </label> <input type="text" placeholder="Email address" autocomplete="username" class=" form-control w-727" >
                                    </div>
                                    <button type="submit" class="btn btn-primary connexion w-727"><!---->
                                        {{trans('front.reset_password_link')}}
                                    </button>
                            {{ Form::close() }}
                                                                            <div>
                                    <a style="color: #f15424;" id="log_in">{{trans('front.want_to_log')}}</a>
                                </div>
                                <div class="create-compte" style="bottom: -18px;position: relative;">
                                    {{trans('front.create_account')}}<a class="inscription" href="#" id="registerAfterForgotPassword">{{trans('front.register')}}</a>

                                </div>
                            </div>
                        </div>
                            
                        <div class="hr-bar w-727">
                            <span  class="hr-bar-content" style="color: rgb(204, 204, 204);">
                                <small >{{trans('front.or')}}</small>
                            </span>
                        </div>
                        <a class="btn btn-primary w-727 with-facebook" style="color: whihte !important;text-align: center;"  target="popup"  href="{{ url('auth/facebook') }}">
                            <i class="icon-facebook fb-design"></i><small class="fb-design"> {{trans('front.facebook_connexion')}}</small>
                        </a>
                        {{ Form::close() }}
                </div>
        </div>
        <br/>
        <div class="create-compte">
            {{trans('front.create_account')}}<a class="inscription" href="#" id="register" >{{trans('front.register')}}</a>
            <div id="registerModel" class="modal">
                <div class="modal-content" style="background: #f4f4f4;margin-top: 82px;">
                    <span class="close-second-model">&times;</span>
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
                            <button id="registrationEmail" class="btn btn-primary w-727 gmail">
                                <i class="far fa-envelope-square"></i>{{trans('front.register_email_address')}}
                            </button>

                            <div id="registerWithEmail" class="modal">
                                <div class="modal-content" style="background: #f4f4f4;margin-top: 82px;">
                                    <div class="controls">
                                        <a class="control-left"><i class="fa fa-angle-left icons-design go-back"></i></a>
                                        <span class="close-third-model">&times;</span>
                                    </div>
                                    <div class="titles-container">
                                        <h1 class="text-center">{{trans('front.create_an_account')}}</h1> 
                                        <h4 class="text-center">{{trans('front.register_with_email_address')}}</h4>
                                        {{ Form::open(['route'=>'frontend.client.store', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
                                        
                                            <div class="form-group">
                                                    <label  class="sr-only">
                                                    {{trans('front.first_name')}}
                                                </label> 
                                                <input   type="text" placeholder="First Name" id="client_name" name="client_name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label  class="sr-only">
                                                {{trans('front.last_name')}}
                                                </label> 
                                                <input   type="text" placeholder="Last Name" id="client_last_name" name="client_last_name" class="form-control">
                                            </div>
                                        <div class="form-group">
                                            <label  class="sr-only">
                                            {{trans('front.email_add')}}
                                            </label> 
                                            <input type="text" placeholder="Email Address" id="email" name="email" class="form-control">
                                        </div>
                                        <label  >
                                            <i class="fas fa-info-circle"></i>{{trans('front.minimum_length')}}
                                        </label>
                                        <div class="form-group">
                                            <label  class="sr-only">
                                            {{trans('front.password')}}
                                            </label> 
                                            <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label style="display: flex;"><input style="width: auto;" id="service_terms" name="service_terms"  type="checkbox" class="form-control">
                                            <span style="margin-top: 12px;">{{trans('front.agree')}} <a style="display: contents;" class="inscription" href="#" id="register" >{{trans('front.service_terms')}}</a>{{trans('front.and')}} <a style="display: contents;" class="inscription" href="#" id="register" >{{trans('front.privacy_policy')}}</a></span>
                                            </label>
                                        </div>
                                        <button  type="submit" class="btn w-727 connexion fb-design" style="text-align: center;" onclick="showDiv()">
                                             {{trans('front.sign_up')}}
                                          </button>
                                        
                                        {{ Form::close() }}
                                    <div class="create-compte" style="bottom: -19px;position: relative;">
                                        {{trans('front.existed_account')}}<a class="inscription" href="#" id="register" >{{trans('front.to_connect')}}</a>
                                    </div>
                                    </div>
                                    
                              
                            </div>

                        </div>	</div>
                            <div class="hr-bar">
                                <span  class="hr-bar-content" >
                                    <small>or</small>
                                </span>
                            </div> 
                            
                            <a class="btn btn-primary w-727 with-facebook" style="color: whihte !important;text-align: center;"  target="popup"  href="{{ url('auth/facebook') }}">
                                <i class="icon-facebook fb-design"></i><small class="fb-design"> {{trans('front.register_facebook')}}</small>
                            </a>
                            <br/><br/><br/>
                    </div>
                    <div class="create-compte" style="bottom: -19px;position: relative;">
                        {{trans('front.existed_account')}}<a class="inscription" href="#" id="register" >{{trans('front.to_connect')}}</a>
                    </div>
                    </div>
                    
              
            </div>

        </div>	
    </div>
  
</div>