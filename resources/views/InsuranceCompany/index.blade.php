@extends('layout', ['activePage' => 'insurance_company', 'titlePage' => trans('backend.insurance_company_managment')])
@section('content')
{{ Breadcrumbs::render('insurance_company') }}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('inssuranceCompany.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class"
                            style="margin:0px 10px">{{ __('backend.new_insurance_company') }}</a>
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.label') }} DE</th>
                                    <th>{{ __('backend.label') }} EN</th>
                                    <th>{{ __('backend.label') }} FR</th>
                                     <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->label_de}}</td>
                                    <td>{{$item->label_en}}</td>
                                    <td>{{$item->label_fr}}</td>
                                   <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('insuranceCompany.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0"><i class="far fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="container">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#myModal" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <p>{{ __('backend.message_delete_insurance_company') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('insuranceCompany.destroy',$item->id) }}" class="btn btn-danger btn-sm rounded-0">Delete</a>
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
                </div>
            </div>
        </div>
    </div>
  </div>
                                            </li>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>{{ __('backend.label') }} DE</th>
                                    <th>{{ __('backend.label') }} EN</th>
                                    <th>{{ __('backend.label') }} FR</th>
                                    <th>{{ __('backend.Operations') }}</th>
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
