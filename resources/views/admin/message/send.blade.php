@extends('admin.layout', ['activePage' => 'message', 'titlePage' => trans('backend.message_managment')])
@section('content')
{{ Breadcrumbs::render('send_message',$data->id) }}
<div class="container-fluid">
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route'=>'message.sendEmail','method'=>'POST']) }}
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.From') }} </label>
                            <input class="col-md-4 form-control" id="from_email" name="from_email" value="unitcamper@gmail.com"/> 
                            <label class="col-md-2">{{ __('backend.To') }} </label>
                            <input class="col-md-4 form-control" id="to_email" name="to_email" value="{{$data->email}}"/> 
                        
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.Subject') }} </label>
                            <input class="col-md-10 form-control" id="subject" name="subject" required="required"/> 
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_content') }} </label>
                            <textarea class="col-md-10 form-control" id="message" name="message" required="required"> </textarea>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button  type="submit" class="btn btn-info">{{ __('backend.Send') }}</button>
                                <a href="{{ route('message.index') }}" class="btn btn-dark">{{ __('backend.Cancel') }}</a>

                            </div>
                        </div>
                        {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@endsection
