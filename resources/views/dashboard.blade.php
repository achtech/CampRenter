@extends('layout', ['activePage' => 'dashboard', 'titlePage' => __('backend.dashboard.lbl')])
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
       <div class="container-fluid">
           <br/>
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('backend.dashboard_today.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_week.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_current_month.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_last_month.lbl') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ __('backend.dashboard_owners_part.lbl') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend.dashboard_unit_campers_part.lbl') }}</td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend.dashboard_total.lbl') }}</td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            
                        </table>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                <br/>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="text-align:center;" class="card-title">{{ __('backend.dashboard_confirm_camper.lbl') }}</h4>
                                <ul class="list-style-none mb-0">
                                    @if($datas->count()>0)
                                    @foreach($datas as $item)
                                    <li>
                                        <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                        <span class="text-muted">{{$item->equipment_name}}</span>
                                        <span class="text-dark font-weight-medium"> {{$item->price_per_day}}$/{{ __('backend.per_day.lbl') }}</span>
                                        <div style="float: right;margin-top: -4px;"><span><a href="{{ '/confirm'.'/'.$item->id }}" class="btn btn-info btn-sm rounded-0" style="height: 26px;width: 41px;margin-top: -1px;" title="Confirm"><i class="fas fa-check" style="color: white;vertical-align: top;"></i></a></span>
</div>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card" style="width: 317px;">
                            <div class="card-body">
                                <h4 style="text-align:center;" class="card-title">{{ __('backend.dashboard_last_booking.lbl') }}</h4>
                                <ul class="list-style-none mb-0">
                                    @foreach($bookings as $item)
                                    <li>
                                        <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                        <span class="text-muted">{{$item->client_name}} {{$item->client_last_name}}</span>
                                     <div style="float: right;margin-top: -4px;"><span class="text-dark float-right font-weight-medium">{{$item->dateFrom}}</span>
                                    </div></li>
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        
                                <div class="card-body">
                                    <a href="{{ route('promotion.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                                        style="width:200px">{{ __('backend.dashboard_new_promotion.btn') }}</a>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('commission.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                                        style="width:200px">{{ __('backend.dashboard_change_commission.btn') }}</a>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('insurance.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                                        style="width:200px">{{ __('backend.dashboard_add_user.btn') }}</a>
                                </div>
                            
                        
                    </div></div>
                    <br/>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">    
                            <div class="card-body">
                                <fieldset class="scheduler-border">
                                    <legend>{{ __('backend.dashboard_recent_message.lbl') }}</legend>
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('backend.dashboard_client_name.lbl') }}</th>
                                                <th>{{ __('backend.dashboard_message.lbl') }}</th>
                                                <th>{{ __('backend.dashboard_view_details.lbl') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            <tr>
                                                <td></td>
                                                <td>Perfect for beginners and those who would like to try out a caravan because our caravan is very compact and light.</td>
                                                <td><a href="#">{{ __('backend.dashboard_view_message_details.lbl') }}</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                
                                </fieldset>            
                            </div>
                        </div>
                    </div>
                    </div>
                           
 

<style>
    fieldset.scheduler-border {
    border: solid 2px #DDD !important;
    padding: 10px 10px 10px 10px;
    border-bottom: none;
    width: fit-content;

}
}
</style>
@endsection