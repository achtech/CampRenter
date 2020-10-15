@extends('layout', ['activePage' => 'dashboard', 'titlePage' => __('backend.Dashboard')])
@section('content')
{{ Breadcrumbs::render('dashboard') }}

       <div class="container-fluid">
           
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card" >
                    <div class="card-body">
                <table  class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('backend.dashboard_today') }}</th>
                                    <th>{{ __('backend.dashboard_week') }}</th>
                                    <th>{{ __('backend.dashboard_current_month') }}</th>
                                    <th>{{ __('backend.dashboard_last_month') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ __('backend.dashboard_owners_part') }}</td>
                                    <td>{{$today_owner ?? '0'}}</td>
                                    <td>{{$week_owner ?? '0'}}</td>
                                    <td>{{$month_owner ?? '0'}}</td>
                                    <td>{{$previous_month_owner ?? '0'}}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend.dashboard_unit_campers_part') }}</td></td>
                                    <td>{{$today_campunit ?? '0'}}</td>
                                    <td>{{$week_campunit ?? '0'}}</td>
                                    <td>{{$month_campunit ?? '0'}}</td>
                                    <td>{{$previous_month_campunit ?? '0'}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <th>{{ __('backend.dashboard_total') }}</th>
                                    <td>{{$today_total ?? '0'}}</td>
                                    <td>{{$week_total ?? '0'}}</td>
                                    <td>{{$month_total ?? '0'}}</td>
                                    <td>{{$previous_month_total ?? '0'}}</td>
                            </tfoot>
                        </table>
       </div></div>
       <br />
                <div class="row">
                    <div class="col-md-4">
                        <div style="margin:10px">
                                <a href="{{ route('promotion.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class"
                                style="position: absolute;bottom:10px;width: 90%;">{{ __('backend.dashboard_new_promotion') }}</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin:10px">
                            <a href="#" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class"
                            style="position: absolute;bottom:10px;width: 90%;">{{ __('backend.dashboard_to_do') }}</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin:10px">
                                <a href="{{ route('user.create') }}"
                                    class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class"
                                    style="position: absolute;bottom:10px;width: 90%;">{{ __('backend.dashboard_add_user') }}</a>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="min-height: 423px;">
                            <div class="card-body" style="min-height: 376px !important;">
                                <h4 style="text-align:center;" class="card-title">{{ __('backend.dashboard_confirm_camper') }}</h4>
                                <table class="table table-striped table-bordered">
                                   <thead>
                                        <tr>
                                            <th>{{ __('backend.camper_name') }}</th>
                                            <th>{{ __('backend.owner_name') }}</th>
                                            <th>{{ __('backend.dashboard_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($datas->count()>0)
                                        @foreach($datas as $item)
                                            <tr>

                                                <td>
                                                    {{$item->camper_name}}
                                                </td>
                                                <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                                <td><a href="{{ route('camper.detail',$item->id) }}" class="btn btn-info btn-sm rounded-0" style="height: 28px;width: 67px;" title="Confirm"><span style="color: white;vertical-align:top;">{{ __('backend.Detail') }}</span></a></td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3" style="text-align: center;">{{ __('backend.no_camper_to_confirm') }}</td>
                                        </tr>

                                        @endif
                                    </tbody>

                                </table>
                                 

                                <a style="position: absolute;bottom:10px;width: 90%;" href="{{ route('camper.unconfirmedCamper') }}" class="btn btn-md waves-effect waves-light btn-rounded btn-primary"
                >{{ __('backend.Read more') }}</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="min-height: 423px;" >
                            <div class="card-body" style="min-height: 376px !important;">
                                <h4 style="text-align:center;" class="card-title">{{ __('backend.dashboard_last_booking') }}</h4>
                                <table class="table table-striped table-bordered">
                            <thead>

                                <tr>
                                    <th>{{ __('backend.Renter') }}</th>
                                    <th>{{ __('backend.Date') }}</th>
                                    <th>{{ __('backend.dashboard_action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($bookings)==0)
                                    <tr>
                                        <td colspan="3" style="text-align: center;">{{ __('backend.No data found') }}</td>
                                    </tr>
                                @endif
                                @foreach($bookings as $item)
                                    <tr>

                                        <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                        <td>{{$item->start_date}}</td>
                                        <td>
                                        <a href="{{ route('booking.detail',$item->id)}}" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-list"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                               </tbody>

                        </table>
                        <a style="position: absolute;bottom:10px;width: 90%;"  href="{{ route('booking.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary"
                >{{ __('backend.Read more') }}</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" >
                                <div class="card-body">
                                <fieldset class="scheduler-border">
                                    <legend>{{ __('backend.dashboard_recent_message') }}</legend>
                                    <table id="default_order" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ __('backend.contact') }}</th>
                                                <th>{{ __('backend.Phone') }}</th>
                                                <th>{{ __('backend.dashboard_message') }}</th>
                                                <th>{{ __('backend.dashboard_view_details') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($messages)==0)
                                            <tr>
                                                <td colspan="3" style="text-align: center;">{{ __('backend.No data found') }}</td>
                                            </tr>
                                        @endif

                                            @foreach($messages as $item)
                                            <tr>
                                                <td>{{$item->full_name}}</td>
                                                <td>{{$item->telephone}}</td>
                                                <td>{{$item->subject}}</td>
                                                <td>
                                                <a href="{{ route('message.show',$item->id)}}" class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" title="Detail Message"><i class="fa fa-newspaper"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </fieldset>
                            </div> </div>
                        </div>
                    </div>
                    </div>



<style>
    fieldset.scheduler-border {
    border: solid 2px #DDD !important;
    padding: 10px 10px 10px 10px;
    border-bottom: none;
}
}
</style>
@endsection
