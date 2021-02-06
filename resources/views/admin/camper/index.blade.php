@extends('admin.layout', ['activePage' => 'camper', 'titlePage' => trans('backend.camper_managment')])
@section('content')
{{ Breadcrumbs::render('camper') }}
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
                                    <th>{{ __('backend.Image') }}</th>
                                    <th>{{ __('backend.camper_name') }}</th>
                                    <th>{{ __('backend.Client') }}</th>
                                    <th>{{ __('backend.category') }}</th>
                                    <th>{{ __('backend.availability') }}</th>
                                    <th>{{ __('backend.Status') }}</th>
                                    <th>{{ __('backend.confirmed') }}</th>
                                    <th>{{ __('backend.Operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td style="vertical-align: middle;text-align:center"><img style="width:100px" src="{{ asset('images/camper') }}/{{$item->image}}"/></td>
                                    <td style="vertical-align: middle;">{{Illuminate\Support\Str::limit($item->camper_name, 25)}}</td>
                                    <td style="vertical-align: middle;">{{App\Http\Controllers\admin\CamperController::getName('clients',$item->id_clients)}}</td>
                                    <td style="vertical-align: middle;">
                                        {{App\Http\Controllers\admin\CamperController::getLabel('camper_categories',$item->id_camper_categories)}}</td>
                                    <td style="vertical-align: middle;text-align:center">
                                    @if($item->is_confirmed==1)
                                        @php($status = App\Http\Controllers\admin\CamperController::getCamperStatus($item->id))
                                        @if($status->bookingStatusId==3 || $status->bookingStatusId==7)
                                        <i class="btn waves-effect waves-light btn-danger">{{$status->label_en}}</i>
                                        @elseif($status->bookingStatusId<3 || ($status->bookingStatusId>=4 && $status->bookingStatusId<=6) )
                                        <i class="btn waves-effect waves-light btn-warning">{{$status->label_en}}</i>
                                        @else
                                        <i class="btn waves-effect waves-light btn-success">{{$status->label_en}}</i>
                                        @endif
                                    @endif
                                    <td style="vertical-align: middle;">
                                    @if($item->is_confirmed==1)
                                        @if($item->availability==0)
                                            Blocked by Owner {{App\Http\Controllers\admin\CamperController::getName('clients',$item->id_clients)}}
                                        @elseif($item->availability==1)
                                            Reserved by {{App\Http\Controllers\admin\CamperController::getName('clients',$item->id_clients)}}
                                            <br />From : {{App\Http\Controllers\admin\CamperController::getBookingCamperStart($item->id)}}
                                            <br />To  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp{{App\Http\Controllers\admin\CamperController::getBookingCamperEnd($item->id)}}
                                        @else
                                            Available
                                        @endif
                                    @endif
                                    </td>
                                    <td style="vertical-align: middle;text-align:center">
                                        @if($item->is_confirmed==1)
                                            <i class="btn waves-effect waves-light btn-outline-success">&nbsp&nbsp&nbspConfirmed &nbsp&nbsp&nbsp</i></br>
                                            by {{App\Http\Controllers\Controller::getUser($item->updated_by)}}
                                        @else
                                            <i class="btn waves-effect waves-light btn-outline-danger">Not Confirmed</i></br>

                                            @php($user = App\Http\Controllers\Controller::getUser($item->updated_by))
                                            {{$user!=null ? "by ".$user : ''}}
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('camper.detail',$item->id)}}" class="btn btn-primary btn-sm rounded-0"  data-toggle="tooltip" title="Details"><i class="fa fa-list"></i></a>
                                            </li>

                                            <li class="list-inline-item">
                                                <button
                                                    class="btn btn-sm rounded-0 @if($item->is_confirmed==1) btn-danger  @else  btn-success @endif"
                                                    id="deletePrgButton"
                                                    data-id="{{$item->id}}" data-toggle="modal" data-target="#delete"data-placement="top" title="Confirm">@if($item->is_confirmed==1) <i class="fas fa-ban"></i>  @else <i class="fas fa-check"></i>@endif
                                                </button>

                                            </li>

                                            <li class="list-inline-item">
                                                <a href="{{ route('camper.reviews',$item->id)}}" class="btn btn-primary btn-sm rounded-0"  data-toggle="tooltip" title="Details"><i class="far fa-star"></i></a>
                                            </li>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <th>{{ __('backend.Image') }}</th>
                                    <th>{{ __('backend.camper_name') }}</th>
                                    <th>{{ __('backend.Client') }}</th>
                                    <th>{{ __('backend.category') }}</th>
                                    <th>{{ __('backend.availability') }}</th>
                                    <th>{{ __('backend.Status') }}</th>
                                    <th>{{ __('backend.confirmed') }}</th>
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
 <!-- Modal -->
 <div class="modal modal-danger fade" id="deletePrgModal" tabindex="-1"
  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel"> {{ __('backend.warning') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form  action="{{route('camper.blockActivateCamper','test')}}" method="post">
            {{csrf_field()}}
          <div class="modal-body">
          {{ __('backend.change_status') }}
                <input type="hidden" name="id" id="id" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal"> {{__('backend.Cancel')}}</button>
            <button type="submit" class="btn btn-info">{{__('backend.apply')}}</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).on("click", "#deletePrgButton", function () {
        var prg = $(this).data('id');
        $(".modal-body #id").val( prg );
        $('#deletePrgModal').modal('show');
    });
</script>

@endsection
