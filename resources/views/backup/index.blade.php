@extends('layout', ['activePage' => 'backup', 'titlePage' => __('backend.backup_managment')])
@section('content')
{{ Breadcrumbs::render('backup') }}
<div class="container-fluid">
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
                                <th>{{ __('backend.backup.file.lbl') }} </th>
                                <th>{{ __('backend.backup.download.lbl') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td>{{$file}}</td> 
                                   <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="{{\App\Http\Controllers\BackupController::getFilesUrlsOfBackup($file)}}" class="btn btn-success btn-sm rounded-0"><i class="fas fa-download"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('backend.backup.file.lbl') }} </th>
                                    <th>{{ __('backend.backup.download.lbl') }}</th>
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
