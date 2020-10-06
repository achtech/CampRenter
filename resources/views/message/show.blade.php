@extends('layout', ['activePage' => 'message', 'titlePage' => __('backend.message_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('detail_message',$messageId) }}
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('message.sendEmail') }}">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-2">{{ __('backend.message_contact_name.lbl') }} : </label>
                                <label class="col-md-2">{{$datas->full_name }} </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_email_from.lbl') }} </label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$datas->email}}"
                                                placeholder="" readonly>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_email_sent_date.lbl') }} </label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$datas->send_date}}"
                                                placeholder="" readonly>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-md-2">{{ __('backend.message_contact_tel.lbl') }} </label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="" value="{{$datas->telephone}}" readonly>
                                        </div>
                                        
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.message_email_subject.lbl') }} </label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="" readonly>{{$datas->subject}}</textarea>
                                        </div>
                                    </div>     
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">{{ __('backend.answer_message.btn') }}</button>
                                <button type="reset" class="btn btn-dark">{{ __('backend.cancel.btn') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection