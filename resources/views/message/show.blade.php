@extends('layout', ['activePage' => 'message', 'titlePage' => __('backend.message_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('detail_message',$messageId) }}
<div class="container-fluid">
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="#">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2">{{ __('backend.message_email_from.lbl') }} </label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="First Input &amp; First Row">
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2">{{ __('backend.message_email_sent_date.lbl') }} </label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Second Input &amp; First Row">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">{{ __('backend.message_contact_tel.lbl') }} </label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="First Input &amp; First Row">
                                                        </div>
                                                    </div> 
                                                    <label class="col-md-2">{{ __('backend.message_email_from.lbl') }} </label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Second Input &amp; First Row">
                                                        </div>
                                                        
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
                                                            <input type="text" class="form-control"
                                                                placeholder="First Input &amp; First Row">
                                                        </div>
                                                    </div>     
                                                </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection