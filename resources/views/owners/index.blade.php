@extends('layout', ['activePage' => 'Owner', 'titlePage' => __('backend.owner.lbl')])
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">{{ __('backend.owners.lbl') }}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div clss="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <a href="{{ route('owners.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" style="width:200px">{{ __('backend.new_owner.btn') }}</a>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.owner_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.client_name.lbl') }}</th>
                                    <th>{{ __('backend.client_last_name.lbl') }}</th>
                                    <th>{{ __('backend.client_email.lbl') }}</th>
                                    <th>{{ __('backend.client_national_number.lbl') }}</th>
                                    <th>{{ __('backend.client_paypal_account.lbl') }}</th>
                                    <th>{{ __('backend.client_operations.lbl') }}</th>
                                    <th>{{ __('backend.client_action.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></button>
                                            </li>  
                                            <li class="list-inline-item">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                            </li> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></button>
                                            </li>  
                                            <li class="list-inline-item">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                            </li> 
                                    </td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.client_name.lbl') }}</th>
                                    <th>{{ __('backend.client_position.lbl') }}</th>
                                    <th>{{ __('backend.client_office.lbl') }}</th>
                                    <th>{{ __('backend.client_age.lbl') }}</th>
                                    <th>{{ __('backend.client_start_date.lbl') }}</th>
                                    <th>{{ __('backend.client_salary.lbl') }}</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection