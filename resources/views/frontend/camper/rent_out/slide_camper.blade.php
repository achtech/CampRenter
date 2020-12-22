
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
      <form action="{{ route('frontend.camper.storeFiles') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
                <label for="document">Old photos</label>
                <div >
                  @foreach($files as $f)
                    <img src="{{ asset('images/campers')}}/{{$f->file_name}}" style="width:150px;width:150px;border: solid black 1px;border-radius: 20px;background: #999; background: linear-gradient(to bottom, #eee, #ddd);">
                  @endforeach
                </div>
          </div>

          <div class="form-group">
                <label for="document">New photos</label>
                <div class="needsclick dropzone" id="document-dropzone">

                </div>
          </div>
          <div>
            <input class="btn btn-danger" type="submit">
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
      @if(isset($files))
        var files =
          {!! json_encode($files) !!}
        for (var i in files) {
          var file = files[i];
          uploadedDocumentMap[file.name] = file.file_name;
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
</script>
@stop
