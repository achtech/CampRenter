@extends('admin.layout', ['activePage' => 'camper', 'titlePage' => trans('backend.Campers Management')])
@section('content')
{{ Breadcrumbs::render('camper_reviews',$camper) }}
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
                                    <th>{{ __('backend.Name') }}</th>
                                    <th>{{ __('backend.Email') }}</th>
                                    <th>{{ __('backend.Comment') }}</th>
                                    <th>{{ __('backend.Service') }}</th>
                                    <th>{{ __('backend.Managing') }}</th>
                                    <th>{{ __('backend.Cleanliness') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>
                                    @if(!empty($item->rate_service))
                                        @for($i=0;$i<$item->rate_service;$i++)
                                            X
                                        @endfor
                                    @endif
                                    </td>
                                    <td>
                                        @if(!empty($item->rate_managing))
                                            @for($i=0;$i<$item->rate_managing;$i++)
                                                X
                                            @endfor
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($item->rate_cleanliness))
                                            @for($i=0;$i<$item->rate_cleanliness;$i++)
                                                X
                                            @endfor
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('backend.Name') }}</th>
                                <th>{{ __('backend.Email') }}</th>
                                <th>{{ __('backend.Comment') }}</th>
                                <th>{{ __('backend.Service') }}</th>
                                <th>{{ __('backend.Managing') }}</th>
                                <th>{{ __('backend.Cleanliness') }}</th>
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
