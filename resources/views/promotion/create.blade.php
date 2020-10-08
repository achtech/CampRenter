@extends('layout', ['activePage' => 'promotion', 'titlePage' => __('backend.promotion_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('promotion') }}
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('promotion.store') }}">     
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.commission_label.lbl') }} </label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="" value="" name="commission">
                                        </div>
                                    </div>     
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.commission_description.lbl') }} </label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="" name="details"></textarea>
                                        </div>
                                    </div>     
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">{{ __('backend.commission_Status.lbl') }} </label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation2"
                                                    name="status">
                                                <label class="custom-control-label" for="customControlValidation2">{{ __('backend.promotion_status_active.lbl') }}</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation3"
                                                name="status">
                                            <label class="custom-control-label" for="customControlValidation3">{{ __('backend.promotion_status_disactivate.lbl') }}</label>
                                    </div>
                                </div>
                                    </div>    
                                </div>
                            </div>
                        </div> 
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">{{ __('backend.create.btn') }}</button>
                                <button type="reset" class="btn btn-dark">{{ __('backend.cancel.btn') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection