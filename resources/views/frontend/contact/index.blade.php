@extends('frontend.layout.layout',['activePage' => 'contact','footerPage' => 'true'])
@section('content')
<!-- Content
   ================================================== -->
<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- Content
   ================================================== -->
<!-- Map Container -->
<div class="contact-map margin-bottom-60">
   <!-- Google Maps -->
   <div id="singleListingMap-container">
      <div id="singleListingMap" data-map-icon="im im-icon-Map2"></div>
   </div>
   <script type="text/javascript">
      var map;
      var latlng = new google.maps.LatLng('47.679293','8.625207');
      function initialize_contact() {
      var mapOptions = {
      	center: latlng,
      	zoom: 15,
      	mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var el=document.getElementById("singleListingMap");
      map = new google.maps.Map(el, mapOptions);

      var marker = new google.maps.Marker({
      	map: map,
      	position: latlng
      });

      var sunCircle = {
      	strokeColor: "#c3fc49",
      	strokeOpacity: 0.8,
      	strokeWeight: 2,
      	fillColor: "#c3fc49",
      	fillOpacity: 0.35,
      	map: map,
      	center: latlng,
      };
      cityCircle = new google.maps.Circle(sunCircle);
      cityCircle.bindTo('center', marker, 'position');
      }

      $ = jQuery.noConflict();
      $(function( $ ) {
      initialize_contact();

      });
   </script>
   <!-- Google Maps / End -->
   <!-- Office -->
   <div class="address-box-container">
      <div class="address-container" data-background-image="images/our-office.jpg">
         <div class="office-address">
            <h3>{{trans('front.our_office')}}</h3>
            <ul>
               <li>Victor Von Bruns-Strasse 20</li>
               <li>8212 Neuhausen am Rheinfall</li>
               <li>Switzerland</li>
            </ul>
         </div>
      </div>
   </div>
   <!-- Office / End -->
</div>
<div class="clearfix"></div>
<!-- Map Container / End -->
<!-- Container / Start -->
<div class="container">
   <div class="row">
      <!-- Contact Details -->
      <div class="col-md-4">
         <h4 class="headline margin-bottom-30">{{trans('front.find_us')}}</h4>
         <!-- Contact Details -->
         <div class="sidebar-textbox">
            <p>{{trans('front.platform_description')}}</p>
            <ul class="contact-details">
               <li><i class="fas fa-phone-alt"></i> <strong>{{trans('front.platform_phone')}}</strong> <span>(123) 123-456 </span></li>
               <li><i class="fas fa-fax"></i> <strong>{{trans('front.platform_fax')}}</strong> <span>(123) 123-456 </span></li>
               <li><i class="fas fa-globe"></i> <strong>{{trans('front.platform_web')}}</strong> <span><a href="">www.campunite.com</a></span></li>
               <li><i class="far fa-envelope"></i> <strong>{{trans('front.platform_email')}}</strong> <span><a href="mailto:support@campunite.com">support@campunite.com</a></span></li>
            </ul>
         </div>
      </div>
      <!-- Contact Form -->
      <div class="col-md-8">
         <section id="contact">
            <h4 class="headline margin-bottom-35">{{trans('front.contact_form')}}</h4>
            <div id="contact-message"></div>
            {{ Form::open(['action'=>'App\Http\Controllers\admin\MessageController@store', 'enctype'=>'multipart/form-data','autocomplete'=>'off','method'=>'POST']) }}
            <div class="row">
               <div class="col-md-6">
                  <div>
                     <input name="full_name" type="text" id="full_name" placeholder="{{trans('front.your_name')}}" required="required" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div>
                     <input name="email" type="email" id="email" placeholder="{{trans('front.email_address')}}" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <input name="subject" type="text" id="subject" placeholder="{{trans('front.subject')}}" required="required" />
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <textarea name="message" cols="40" rows="3" placeholder="{{trans('front.message')}}" spellcheck="true" required="required" ></textarea>
               </div>
            </div>
            <input type="submit" class="submit button" id="submit" value="{{trans('front.submit_message')}}" />
            {{ Form::close() }}
         </section>
      </div>
      <!-- Contact Form / End -->
   </div>
</div>
<!-- Container / End -->
<!-- Recent Blog Posts / End -->
@endsection
