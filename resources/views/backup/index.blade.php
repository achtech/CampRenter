@extends('layout', ['activePage' => 'backup', 'titlePage' => trans('backend.backup_managment')])
@section('content')
{{ Breadcrumbs::render('backup') }}
<div class="container-fluid">
<script>
$(document).ready(function() {
    var table = $('#default_order').DataTable();
    // Hide two columns
    table.columns( [0,1] ).visible( false );
} );
</script>
    <div class="card-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="default_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>{{ __('backend.File') }} </th>
                                    <th>{{ __('backend.Download') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>{{$file['filename']}}</td>
                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('backup.download',$file['filename']) }}" class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>{{ __('backend.File') }} </th>
                                    <th>{{ __('backend.Download') }}</th>
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
