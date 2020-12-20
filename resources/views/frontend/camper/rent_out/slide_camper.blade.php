
@extends('frontend.layout.layout_panel',['activePage'=>'slide_camper'])

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{isset($camper) ? $camper->camper_name : ''}}</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						{{ Breadcrumbs::render('rentOut') }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'slide_camper'])
		
 			
		<div class="col-lg-7 col-md-12">
			<h3><strong>{{trans('front.photos')}}</strong></h3>
			<div class="row">
				<div class="image-upload-one">
					<div class="submit-section">
						<form action="{{route('frontend.camper.fileupload')}}" class='dropzone' method="POST" >
							<meta name="csrf-token" content="{{ csrf_token() }}">
							<input type="hidden" name="id_campers" value="{{$camper->id}}" />
							<div class="row">
								<div class="col-md-12">
								<div style="float: right;position:absolute;top:200px">
									{{Form::submit(trans('front.apply'),['style' => 'width:200px','class'=>'button border','name' => 'action'])}}
									{{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <!-- Script -->
 <script>
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone",{ 
        maxFilesize: 20,  // 3 mb
        acceptedFiles: ".jpeg,.jpg,.png,.pdf",
    });
    myDropzone.on("sending", function(file, xhr, formData) {
       formData.append("_token", CSRF_TOKEN);
    }); 
</script>
  <script>

    function showPreviewOne(event){
      if(event.target.files.length > 0){
        let src = URL.createObjectURL(event.target.files[0]);
        let preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
      }
    }
    function myImgRemoveFunctionOne() {
      document.getElementById("file-ip-1-preview").src = "https://i.ibb.co/ZVFsg37/default.png";
    }

  </script>
@endsection
