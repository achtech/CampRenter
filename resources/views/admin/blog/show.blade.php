@extends('admin.layout', ['activePage' => 'blog', 'titlePage' => __('backend.blog_managment')])
@section('content')
{{ Breadcrumbs::render('show_blog',$data) }}
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img style="max-width:100%" src="/images/blog/{{$data->photo}}"  style="with:200px"/>
                </div>
            </div>
        </div>  
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$data->title}}</h4>
                    <div class="mt-4">
                        <div class="form-group">
                        <p>{{$data->article ?? 'add article'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>

@endsection