<div class="col-md-12" style="margin-top: 12px;" >
    <div class="dashboard-list-box margin-top-0">
        <h4 class="gray">{{ __('front.login_credentials') }}</h4>
        <div class="dashboard-list-box-static">
            {{ Form::open(['route'=>'frontend.client.change_password','method'=>'POST']) }}
                @csrf
                <div class="my-profile2">
                    <div class="row" >
                        <div class="col-md-4">
                            <label class="margin-top-0">{{ __('front.current_password') }}</label>
                            <input type="password" id="password" name="password" >
                        </div>
                        <div class="col-md-4">
                            <label>{{ __('front.new_password') }}</label>
                            <input type="password" id="new_password" name="new_password">
                        </div>
                        <div class="col-md-4">		
                            <label>{{ __('front.confirm_new_password') }}</label>
                            <input type="password" id="confirmed_password" name="confirmed_password">
                        </div>
                    </div>
                </div>
                {{Form::submit(__('front.change_password'),['style'=>'width: 100%;','class'=>'button margin-top-15','name' => 'action'])}}
            {{ Form::close() }}
        </div>
    </div>
</div>

