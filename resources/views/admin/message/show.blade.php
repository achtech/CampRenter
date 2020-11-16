@extends('admin.layout', ['activePage' => 'message', 'titlePage' => trans('backend.message_managment')])
@section('content')
{{ Breadcrumbs::render('detail_message',$messageId) }}
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-2">{{ __('backend.Contact name') }} : </label>
                                <label class="col-md-2">: {{$datas->full_name }} </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.From') }} </label>
                            <input class="col-md-2" id="email" name="email" value="{{$datas->email }}" style="border: none;color: #7c8798;"/> 
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.Date sent') }} </label>
                            <label class="col-md-2">: {{$datas->send_date }} </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.Phone') }} </label>
                            <label class="col-md-2">: {{$datas->telephone }} </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.Subject') }} </label>
                            <label class="col-md-2">: {{$datas->subject }} </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_content') }} </label>
                            <label class="col-md-8">: {{$datas->message }} </label>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a href="{{ route('message.sendEmailToClient',$datas->id) }}" class="btn btn-info">{{ __('backend.Answer') }}</a>
                                <a href="{{ route('message.index') }}" class="btn btn-dark">{{ __('backend.Cancel') }}</a>
                            </div>
                        </div>

            </div>
        </div>
    </div>
</div>
@endsection
