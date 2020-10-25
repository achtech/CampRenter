@extends('admin.layout',['activePage' => 'client', 'titlePage' => trans('backend.Clients Management')])
@section('content')
{{ Breadcrumbs::render('client') }}
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.start_date') }}</th>
                                    <th>{{ __('backend.end_date') }}</th>
                                    <th>{{ __('backend.total') }}</th>
                                    <th>{{ __('backend.booking_status') }}</th>
                                    <th>{{ __('backend.billing_status') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>

                                    <td >{{$item->start_date}}</td>
                                    <td>{{$item->end_date}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->status_booking}}</td>
                                    <td>{{$item->status_billings}}</td>
                                    <td>
                                        <a href="{{ route('booking.detail',$item->id ) }}" class="btn btn-info btn-sm rounded-0">{{ __('backend.check_camper_detail') }}</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
