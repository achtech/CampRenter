@extends('layout', ['activePage' => 'message', 'titlePage' => __('backend.message_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('detail_message',$messageId) }}
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="mailto:{{$datas->email}}">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-2">{{ __('backend.message_contact_name.lbl') }} : </label>
                                <label class="col-md-2">: {{$datas->full_name }} </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_email_from.lbl') }} </label>
                            <label class="col-md-2">: {{$datas->email }} </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_email_sent_date.lbl') }} </label>
                            <label class="col-md-2">: {{$datas->send_date }} </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_contact_tel.lbl') }} </label>
                            <label class="col-md-2">: {{$datas->telephone }} </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_email_subject.lbl') }} </label>
                            <label class="col-md-2">: {{$datas->subject }} </label>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button  type="submit" class="btn btn-info">{{ __('backend.answer_message.btn') }}</button>
                                <button type="reset" class="btn btn-dark">{{ __('backend.cancel.btn') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
