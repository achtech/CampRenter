@extends('layout', ['activePage' => 'message', 'titlePage' => __('backend.message_managment.lbl')])
@section('content')
{{ Breadcrumbs::render('message') }}
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
                                    <th>{{ __('backend.owner.lbl') }}</th>
                                    <th>{{ __('backend.renter.lbl') }}</th>
                                    <th>{{ __('backend.date.lbl') }}</th>
                                    <th>{{ __('backend.send_date.lbl') }}</th>
                                    <th>{{ __('backend.content.lbl') }}</th>
                                    <th>{{ __('backend.operations.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $item)
                                <tr>
                                    <td>
                                <img style="width:64px;height:64px;" src="/assets/images/messages/{{$item->picture}}" ></td>
                                    <td>{{$item->full_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{$item->subject}}</td>
                                    <td>{{$item->send_date}}</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                                @endforeach

                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.owner.lbl') }}</th>
                                    <th>{{ __('backend.renter.lbl') }}</th>
                                    <th>{{ __('backend.date.lbl') }}</th>
                                    <th>{{ __('backend.send_date.lbl') }}</th>
                                    <th>{{ __('backend.content.lbl') }}</th>
                                    <th>{{ __('backend.operations.lbl') }}</th>
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