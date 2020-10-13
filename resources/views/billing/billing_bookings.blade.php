@extends('layout', ['activePage' => 'billing', 'titlePage' => __('backend.billing_managment')])
@section('content')
{{ Breadcrumbs::render('billing_bookings') }}
<div class="container-fluid ">
    <div class="row space-top">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.Renter') }}</th>
                                    <th>{{ __('backend.Camper') }}</th>
                                    <th>{{ __('backend.From') }}</th>
                                    <th>{{ __('backend.To') }}</th>
                                    <th>{{ __('backend.Price per day') }}</th>
                                    <th>{{ __('backend.booking_status_booking') }}</th>
                                    <th>{{ __('backend.status_billing') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                    <tr>
                                        <td>{{$item->renter_name }} {{$item->renter_last_name }}</td>
                                        <td>{{$item->camper_name}}</td>        
                                        <td>{{$item->start_date}}</td>
                                        <td>{{$item->end_date}}</td>
                                        <td>{{$item->price_per_day}}</td>
                                        <td>{{ app()->getLocale() == 'de' ? $item->status_booking_de : $item->status_booking_en }}</td>
                                        <td>{{ $item->status_billings }}</td>
                                    </tr>
                                @endforeach     
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.Renter') }}</th>
                                    <th>{{ __('backend.Camper') }}</th>
                                    <th>{{ __('backend.From') }}</th>
                                    <th>{{ __('backend.To') }}</th>
                                    <th>{{ __('backend.Price per day') }}</th>
                                    <th>{{ __('backend.booking_status_booking') }}</th>
                                    <th>{{ __('backend.status_billing') }}</th>
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