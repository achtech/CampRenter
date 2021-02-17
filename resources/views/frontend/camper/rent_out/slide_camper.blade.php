
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
		<!-- sub_menu  -->
		@include('frontend.camper.rent_out.sub_menu', ['active_page' => 'slide_camper'])

		<div class="col-lg-7 col-md-12">
			<h3><strong>{{trans('front.photos')}}</strong></h3>
      <form action="{{ route('frontend.camper.storeFiles') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id_campers" value="{{$camper->id}}" />
          <div class="row">
            <div class="col-12">
              <div class="form-group col-6">
                    <label for="document">Pricncipal camper <picture></picture></label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" onchange="readCamperImage(this);">
                    </div>
              </div>
              <div class="form-group col-6 camper_image">
              @if($camper['image'] != "camper_rent.png")
                <img   src="{{asset('images/camper')}}/{{$camper['image']}}" alt="" id="camper_image">
                @else
                <img alt="" id="camper_image">
              @endif
              </div>
            </div>
          </div>
          <div class="form-group">
                <label for="document">Gallery images</label>
                <div class="needsclick dropzone" id="document-dropzone">

                </div>
          </div>
          @if(count($files)>0)
          <div class="form-group">
                <label for="document">All photos</label>
                <div  class="old-photos" >
                  <div style="display: grid;
                              grid-template-columns: repeat(4, 1fr);
                              grid-template-rows: repeat({{$countFiles}}, 5vw);
                              grid-gap: 30px;">
                      @foreach($files as $f)
                        <div style="text-align: center;padding-bottom:10px;color:grey">
                          <img src="{{ asset('images/campers')}}/{{$f->file_name}}" style=" width: 100%;height: 100%;object-fit: cover;border-radius: 20px;" >
                          <a href="/rentOut/photos/delete/{{$camper->id}}/{{$f->id}}" style="text-align:center">Remove file</a>
                        </div>
                      @endforeach
                  </div>
                </div>
          </div>
          @endif
          <div>
              {{Form::submit(trans('front.apply'),['style' => 'width:200px','class'=>'button border','name' => 'action'])}}
              {{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}

          </div>
      </form>

		</div>
	</div>
</div>
 <!-- Script -->
 @endsection
 @section('script')
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route('frontend.camper.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name;
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
    }
  }
	 function readCamperImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#camper_image')
                        .attr('src', e.target.result)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@stop
