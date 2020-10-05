@extends('layout', ['activePage' => 'dashboard', 'titlePage' => __('backend.dashboard.lbl')])
@section('content')
{{ Breadcrumbs::render('dashboard') }}

       <div class="container-fluid">
           <br/>
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
                                    <th>{{ __('backend.dashboard_today.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_week.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_current_month.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_last_month.lbl') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ __('backend.dashboard_owners_part.lbl') }}</td>
                                    <td>{{$today_owner ?? '0'}}</td>
                                    <td>{{$week_owner ?? '0'}}</td>
                                    <td>{{$month_owner ?? '0'}}</td>
                                    <td>{{$previous_month_owner ?? '0'}}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend.dashboard_unit_campers_part.lbl') }}</td></td>
                                    <td>{{$today_campunit ?? '0'}}</td>
                                    <td>{{$week_campunit ?? '0'}}</td>
                                    <td>{{$month_campunit ?? '0'}}</td>
                                    <td>{{$previous_month_campunit ?? '0'}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <th>{{ __('backend.dashboard_total.lbl') }}</th>
                                    <td>{{$today_total ?? '0'}}</td>
                                    <td>{{$week_total ?? '0'}}</td>
                                    <td>{{$month_total ?? '0'}}</td>
                                    <td>{{$previous_month_total ?? '0'}}</td>
                            </tfoot>
                        </table>
       </div></div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
               
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="min-height: 423px;">
                            <div class="card-body" style="min-height: 376px !important;">
                                <h4 style="text-align:center;" class="card-title">{{ __('backend.dashboard_confirm_camper.lbl') }}</h4>
                                
                                <table class="table table-striped table-bordered">
                            <thead>
                                
                                <tr>
                                    <th>{{ __('backend.equipment_name.lbl') }}</th>
                                    <th>{{ __('backend.owner_name.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_action.lbl') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
							@if($datas->count()>0)
                                @foreach($datas as $item)
                                    <tr>
                                   
                                        <td>
                                            @if(app()->getLocale()=='en')
                                                {{$item->label_en}} 
                                            @if(app()->getLocale()=='de')
                                                {{$item->label_de}}     
                                            @if(app()->getLocale()=='fr')
                                                {{$item->label_fr}}
                                            @endif
                                            @endif
                                            @endif
                                        </td>
                                        <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                        <td><a href="{{ route('equipment.detail',$item->id) }}" class="btn btn-info btn-sm rounded-0" style="height: 28px;width: 67px;" title="Confirm"><span style="color: white;vertical-align:top;">{{ __('backend.detail.btn') }}</span></a></td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" style="text-align: center;">{{ __('backend.no_data_to_confirm.lbl') }}</td>
                                </tr>
                                
								 @endif
                               </tbody>
                            
                        </table>
                        <br/>
                           
                                <a style="position: absolute;bottom:10px;width: 90%;" href="{{ route('equipment.unconfirmedEquipment') }}" class="btn btn-md waves-effect waves-light btn-rounded btn-primary" 
                >{{ __('backend.read_more.btn') }}</a>
               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="min-height: 423px;" >
                            <div class="card-body" style="min-height: 376px !important;">
                                <h4 style="text-align:center;" class="card-title">{{ __('backend.dashboard_last_booking.lbl') }}</h4>
                                <table class="table table-striped table-bordered">
                            <thead>
                                
                                <tr>
                                    <th>{{ __('backend.renter_name.lbl') }}</th>
                                    <th>{{ __('backend.date_booking.lbl') }}</th>
                                    <th>{{ __('backend.dashboard_action.lbl') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $item)
                                    <tr>
                                   
                                        <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                        <td>{{$item->dateFrom}}</td>
                                        <td><a href="{{ route('booking.index') }}" class="btn btn-info btn-sm rounded-0" style="height: 28px;width: 67px;" title="Confirm"><span style="color: white;vertical-align:top;">{{ __('backend.detail.btn') }}</span></a></td>
                                    </tr>
                                @endforeach
                               </tbody>
                            
                        </table>
                        <a style="position: absolute;bottom:10px;width: 90%;"  href="{{ route('booking.index') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary" 
                >{{ __('backend.read_more.btn') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="min-height: 423px;">
                            <div class="card-body" style="min-height: 376px !important;">
                                <h4 style="text-align:center;" class="card-title">{{ __('backend.dashboard_action.lbl') }}</h4>
                                <br/>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-5">
                                        <a href="{{ route('promotion.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                                        style="width:200px">{{ __('backend.dashboard_new_promotion.btn') }}</a>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                               <br/>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-5">
                                        <a href="{{ route('commission.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                                        style="width:200px">{{ __('backend.dashboard_change_commission.btn') }}</a>    
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-5">
                                        <a href="{{ route('insurance.create') }}" class="btn waves-effect waves-light btn-rounded btn-rounded btn-primary float-right add-class" 
                                style="width:200px">{{ __('backend.dashboard_add_user.btn') }}</a>    
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            
                            </div>
                        </div>
                    </div> </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">    
                            <div class="card" >
                                <div class="card-body">            
                                <fieldset class="scheduler-border">
                                    <legend>{{ __('backend.dashboard_recent_message.lbl') }}</legend>
                                    <table id="default_order" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ __('backend.dashboard_client_name.lbl') }}</th>
                                                <th>{{ __('backend.dashboard_message.lbl') }}</th>
                                                <th>{{ __('backend.dashboard_view_details.lbl') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            @foreach($messages as $item)
                                            <tr>
                                                <td>{{$item->client_name}} {{$item->client_last_name}}</td>
                                                <td>{{$item->message}}</td>
                                                <td><a href="{{ route('message.index') }}">{{ __('backend.dashboard_view_message_details.lbl') }}</a></td>
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