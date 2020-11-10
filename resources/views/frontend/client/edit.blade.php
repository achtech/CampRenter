@extends('frontend.layout.layout',['activePage' => 'camper'])

@section('content')
<div class="container" style="width=100%;">
	<div class="row">
        <h1>{{trans('front.password_reset')}}</h1> 
        {{ Form::open(['action'=>'App\Http\Controllers\frontend\FClientController@updatePassword', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'PUT']) }}
            <input type="hidden" id="client_id" name="client_id" value="{{$client_id}}">
        <div class="col-md-12">
            <div class="wrapper" >
                <div class="container" >
                    <div class="row" >
                        <div class="col-24" >
                            <p >{{trans('front.set_new_password')}} </p>
                            <div class="mcplaceholder mb-3" >
                                    <input id="plainPassword" style="width:90%;" type="password" id="password" name="password" placeholder="Password" required="required" aria-required="true" value="" class="form-control" >
                                    <input id="plainPassword" style="width:90%;" type="password" id="confirmed" name="confirmed" placeholder="Confirm Password" required="required" aria-required="true" value="" class="form-control" > 
                            </div>
                        </div> 
                        @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                        <div class="col-24">
                            {{Form::submit(__('front.save_new_password'),['style' => 'width:200px','class'=>'btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right','name' => 'action'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}

    </div>	
</div>
@endsection