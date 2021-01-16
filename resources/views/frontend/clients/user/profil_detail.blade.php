
<div class="dashboard-list-box margin-top-0">
    <h4 class="gray">{{ __('front.profile_details') }}</h4>
    <div class="dashboard-list-box-static">
        <div class="my-profile dashboard-list-box-static" style="padding-left: 1px;">
            <label>{{ __('front.profil_name') }}</label>
            <input id="client_name" name="client_name" class="form-control" value="{{$client['client_name']}}" type="text">
            <label>{{ __('front.profil_last_name') }}</label>
            <input  id="client_last_name" name="client_last_name" class="form-control" value="{{$client['client_last_name']}}" type="text">
            <label>{{ __('front.profil_sex') }}</label>
            <select name="sex" class="chosen-select" data-placeholder="{{trans('front.sex')}}">
                <option label="Opening Time"></option>
                <option value="female" @if($client->sex=='female') selected @endif>{{trans('front.female')}}</option>
                <option value="male" @if($client->sex=='male') selected @endif>{{trans('front.male')}}</option>
            </select>
            <label>{{ __('front.profil_email') }}</label>
            <input  id="email" name="email" class="form-control" value="{{$client['email']}}" type="text" disabled>
            <label>{{ __('front.street') }}</label>
            <input  id="street" name="street" class="form-control" value="{{$client['street']}}" type="text" >
            <label>{{ __('front.street_number') }}</label>
            <input  id="street_number" name="street_number" class="form-control" value="{{$client['street_number']}}" type="text" >
            <label>{{ __('front.location') }}</label>
            <input  id="location" name="location" class="form-control" value="{{$client['location']}}" type="text" >
            <label>{{ __('front.postal_code') }}</label>
            <input  id="postal_code" name="postal_code" class="form-control" value="{{$client['postal_code']}}" type="text" >
            <label>{{ __('front.country') }}</label>
            <input  id="country" name="country" class="form-control" value="{{$client['country']}}" type="text" >
            <label>{{ __('front.profil_phone') }}</label>
            <input id="telephone" name="telephone" class="form-control" value="{{$client['telephone']}}" type="text">
            <label>{{ __('front.profil_phone_code') }}</label>
            <input id="telephone_code" name="telephone_code" class="form-control" value="{{$client['telephone_code']}}" type="text">
            <label>{{ __('front.profil_review') }}</label>
            <input id="review" name="review" class="form-control" value="{{$client['review']}}" type="text">
            <label>{{ __('front.profile_driving_licence') }}</label>
            <input id="driving_licence" name="driving_licence" class="form-control" value="{{$client['driving_licence']}}" type="tel">
            <label>{{ __('front.profile_status') }}</label>
            <input id="status" name="status" class="form-control" value="{{$client_status}}" type="text" disabled>
            <label>{{ __('front.national_code') }}</label>
            <input id="national_id" name="national_id" class="form-control" value="{{$client['national_id']}}" type="text" >
            <label>{{ __('front.date_of_birth') }}</label>
            <div class="row" style="margin-bottom:20px">
                <div class="col-md-4">
                    <select name="day_of_birth" id="day_of_birth" class="chosen-select" data-placeholder="Day">
                        @for($i=1;$i<=31;$i++)
                            <option value="{{$i}}" @if($client->day_of_birth==$i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="month_of_birth" id="month_of_birth" class="chosen-select" data-placeholder="Month">
                        @for($i=1;$i<=12;$i++)
                            <option value="{{$i}}" @if($client->month_of_birth==$i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="year_of_birth" id="year_of_birth" class="chosen-select" data-placeholder="Year">
                        @for($i=1920;$i<=2100;$i++)
                            <option value="{{$i}}" @if($client->year_of_birth==$i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-list-box margin-top-10">
    <h4 class="gray">{{ __('front.attachements') }}</h4>
    <div class="dashboard-list-box-static my-profile">
        <div class="row">
            <div class="col-md-6">
                <div class="edit-profile-photo" style="height: 259px;">
                    <label>{{ __('front.photo') }}</label><br>
                    <img style="margin-top-10" src="{{asset('images/clients')}}/{{$client['photo']}}" alt="" id="client_image">
                    <div class="change-photo-btn">
                        <div class="photoUpload custom-file">
                            <span><i class="fa fa-upload"></i> {{ __('front.upload_photos') }}</span>
                            <input type="file" id="photo" name="photo" class="upload custom-file-input" onchange="readProfileImage(this);" />

                        </div>
                    </div>
                </div>
                <div class="edit-profile-photo">
                    <label>{{ __('front.image_national') }}</label><br>
                    <img src="images/clients/{{$client['image_national_id']}}" alt="" id="client_cin">
                    <div class="change-photo-btn">
                        <div class="photoUpload custom-file">
                            <span><i class="fa fa-upload"></i> {{ __('front.upload_image_national') }}</span>
                            <input type="file" id="image_national_id" name="image_national_id" class="upload custom-file-input" onchange="readProfileCin(this);" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="edit-profile-photo" style="margin-top-10">
                    <label>{{ __('front.avatar') }}</label><br>
                    <div class="row" >
                        @foreach($avatars as $elem)

                            <div class="col-md-4" >
                                    <span style="cursor: pointer;">
                                    <input type="radio" class="avatar-design" name="id_avatars" id="id_avatars" value="{{$elem->image}}">
                                    <input type="hidden" name="id_avatars" value="" />
                                    <img onclick="javascript:avatarSelected({{$elem->id}})" id="avatar_{{$elem->id}}"
                                    data-picture_avatar_id="{{$elem->id}}"
                                         src="images/clients/{{$elem->image}}" alt="" class="avatar"
                                         style="width:64px;height:64px;border-radius: 50%;@if($elem->id==$client['id_avatars']) outline:2px solid #38b6cd; @endif ">
                                    </span>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="edit-profile-photo">
                    <label>{{ __('front.driving_licence_image') }}</label><br>
                    <img src="images/clients/{{$client['driving_licence_image']}}" alt="" id="client_driving_licence">
                    <div class="change-photo-btn">
                        <div class="photoUpload custom-file">
                            <span><i class="fa fa-upload"></i> {{ __('front.driving_licence') }}</span>
                            <input type="file" id="driving_licence_image" name="driving_licence_image" class="upload custom-file-input" onchange="readProfileDrivingLicence(this);" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$("img[data-picture_avatar_id]").click(function(e){
	//Set the value of the hidden input field
	$("input[name='id_avatars']").val($(this).data('picture_avatar_id'));
});

	function avatarSelected(id){
		var obj = <?php echo json_encode($avatarsIds); ?>;
		for( i =0;i<obj.length;i++){
            if(obj[i]==id){
				document.getElementById('avatar_'+obj[i]).style.outline="2px solid #38b6cd";
            }else{
				document.getElementById('avatar_'+obj[i]).style.outline="none";
            }
        }
	}

</script>