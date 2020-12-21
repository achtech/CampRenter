
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
						<form action="{{ route('frontend.camper.fileupload') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id_campers" value="{{$camper->id}}" />
							<div class="form-group">
								<label for="document">Documents</label>
								<div class="needsclick dropzone" id="document-dropzone">

								</div>
							</div>
							<div>
							 	<input type="submit" style = 'width:200px' class='button border' value="Apply">
								<input type="button" style = 'width:200px' class='button border' onclick='window.history.go(-1); return false;' value="Return">
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
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route('frontend.camper.fileupload') }}',
    maxFilesize: 3, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
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
      @if(isset($project) && $project->document)
        var files =
          {!! json_encode($project->document) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
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
