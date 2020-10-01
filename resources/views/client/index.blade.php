@extends('layout',['activePage' => 'client', 'titlePage' => __('backend.client.lbl')])
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
                    <h4 class="card-title">List of Clients</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend.client_name.lbl') }}</th>
                                    <th>{{ __('backend.client_last_name.lbl') }}</th>
                                    <th>{{ __('backend.client_email.lbl') }}</th>
                                    <th>{{ __('backend.client_national_number.lbl') }}</th>
                                    <th>{{ __('backend.client_current_solde.lbl') }}</th>
                                    <th>{{ __('backend.client_total_solde.lbl') }}</th>
                                    <th>{{ __('backend.client_equipments.lbl') }}</th>
                                    <th>{{ __('backend.client_rents.lbl') }}</th>
                                    <th>{{ __('backend.client_action.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td >{{$item->client_name}}</td>
                                    <td>{{$item->client_last_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->national_id}}</td>
                                    <td>{{App\Http\Controllers\ClientController::getCurrentSolde($item->id)}}</td>
                                    <td>{{App\Http\Controllers\ClientController::getTotalsSolde($item->id)}}</td>
                                    <td>
                                        <a href="{{ route('client.index').'/'.$item->id.'/equipmentDetail' }}" class="btn btn-info btn-sm rounded-0">{{ __('backend.equipment.btn') }}</a>

                                    </td>
                                    <td>
                                        <a href="{{ route('client.index').'/'.$item->id.'/rentDetail' }}" class="btn btn-info btn-sm rounded-0">{{ __('backend.rentes.btn') }}</a>
       
                                    </td>
                                    <td>
                                        <ul class="list-inline m-0">
                                             
                                            <li class="list-inline-item">
                                                <a href="{{ route('client.index').'/'.$item->id.'/detail'}}" class="btn btn-success btn-sm rounded-0" title="Detail"><i class="fas fa-eye"></i></a>
                                            </li>
                                            @if($item->status=='active')
                                            <li class="list-inline-item" >
                                                <a href="{{ route('client.edit',$item->id)}}" class="btn btn-danger btn-sm rounded-0" data-toggle="modal" data-target="#block" title="Block"><i class="fas fa-ban"></i></a>
                                            <!-- Modal -->
 <div class="modal fade" id="block" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>{{ __('backend.client_block_message.lbl') }}</p>
        </div>
        <div class="modal-footer">
            <a href="{{ route('client.index').'/'.$item->id.'/block' }}" class="btn btn-danger btn-sm rounded-0"> {{ __('backend.client_block.btn') }}</a>
            <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
        </div>
      </div>
    </div>
    </div>
                                            </li>
                                            @else
                                            <li class="list-inline-item">
                                                <a href="{{ route('client.edit',$item->id)}}" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#activate" title="Activate"><i class="fas fa-check"></i></a>
                                                                              <!-- Modal -->
 <div class="modal fade" id="activate" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>{{ __('backend.client_active_message.lbl') }}</p>
        </div>
        <div class="modal-footer">
            <a href="{{ route('client.index').'/'.$item->id.'/active' }}" class="btn btn-danger btn-sm rounded-0"> {{ __('backend.client_activate.btn') }}</a>
            <!--<button type="button" class="btn btn-default" data-dismiss="modal" class="btn btn-primary btn-sm rounded-0">Close</button>-->
        </div>
      </div>
    </div>
    </div>
                                            </li>
                                            @endif
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