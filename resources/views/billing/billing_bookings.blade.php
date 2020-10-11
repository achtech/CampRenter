@extends('layout', ['activePage' => 'booking', 'titlePage' => __('backend.booking_management.lbl')])
@section('content')
{{ Breadcrumbs::render('booking') }}
<div class="container-fluid ">
    <div class="row space-top">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('backend.booking_list.lbl') }}</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.booking_renter.lbl') }}</th>
                                    <th>{{ __('backend.booking_camper.lbl') }}</th>
                                    <th>{{ __('backend.booking_from.lbl') }}</th>
                                    <th>{{ __('backend.booking_to.lbl') }}</th>
                                    <th>{{ __('backend.booking_price_per_day.lbl') }}</th>
                                    <th>{{ __('backend.booking_status_booking.lbl') }}</th>
                                    <th>{{ __('backend.booking_status_billing.lbl') }}</th>
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
                                    <th>{{ __('backend.booking_renter.lbl') }}</th>
                                    <th>{{ __('backend.booking_camper.lbl') }}</th>
                                    <th>{{ __('backend.booking_from.lbl') }}</th>
                                    <th>{{ __('backend.booking_to.lbl') }}</th>
                                    <th>{{ __('backend.booking_price_per_day.lbl') }}</th>
                                    <th>{{ __('backend.booking_status_booking.lbl') }}</th>
                                    <th>{{ __('backend.booking_status_billing.lbl') }}</th>
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