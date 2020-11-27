<div class="dashboard-list-box margin-top-0">
    <h4 class="gray">{{ __('front.account_holder') }}</h4>
    <div class="dashboard-list-box-static my-profile">
        <label>{{ __('front.account_holder_name') }}</label>
        <input id="account_holder_name" name="account_holder_name" value="{{$client['account_holder_name']}}" class="form-control" type="tel">
        <label>{{ __('front.street') }}</label>
        <input  id="account_holder_street" name="account_holder_street" class="form-control" value="{{$client['account_holder_street']}}" type="text" >
        <label>{{ __('front.account_holder_building_number') }}</label>
        <input  id="account_holder_building_number" name="account_holder_building_number" class="form-control" value="{{$client['account_holder_building_number']}}" type="text" >
        <label>{{ __('front.postal_code') }}</label>
        <input  id="account_holder_postal_code" name="account_holder_postal_code" class="form-control" value="{{$client['account_holder_postal_code']}}" type="text" >
        <label>{{ __('front.location') }}</label>
        <input  id="account_holder_location" name="account_holder_location" class="form-control" value="{{$client['account_holder_location']}}" type="text" >
        <label>{{ __('front.country') }}</label>
        <input  id="account_holder_country" name="account_holder_country" class="form-control" value="{{$client['account_holder_country']}}" type="text" >
    </div>
</div>
<div class="dashboard-list-box margin-top-10">
    <h4 class="gray">{{ __('front.bank_data') }}</h4>
    <div class="dashboard-list-box-static my-profile">
        <label>{{ __('front.bank_data_adress') }}</label>
        <input id="bank_data_adress" name="bank_data_adress" value="{{$client['bank_data_adress']}}" class="form-control" type="tel">
        <label>{{ __('front.bank_data_iban') }}</label>
        <input  id="bank_data_iban" name="bank_data_iban" class="form-control" value="{{$client['bank_data_iban']}}" type="text" >
        <label>{{ __('front.bank_data_bic') }}</label>
        <input  id="bank_data_bic" name="bank_data_bic" class="form-control" value="{{$client['bank_data_bic']}}" type="text" >
    </div>
</div>

<div class="dashboard-list-box margin-top-10">
    <h4 class="gray">{{ __('front.languages') }}</h4>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input id="check-a" type="checkbox" name="language[]"  value="DE" @if(isset($languages) && is_array($languages) && in_array("DE",$languages)) checked @endif>
        <label for="check-a">{{trans('front.german')}}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input id="check-b" type="checkbox" name="language[]" value="EN" @if(isset($languages) && is_array($languages) && in_array("EN",$languages)) checked @endif>
        <label for="check-b">{{trans('front.english')}}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input id="check-c" type="checkbox" name="language[]" value="IT" @if(isset($languages) && is_array($languages) && in_array("IT",$languages)) checked @endif>
        <label for="check-c">{{trans('front.italian')}}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input id="check-d" type="checkbox" name="language[]" value="FR" @if(isset($languages) && is_array($languages) && in_array("FR",$languages)) checked @endif>
        <label for="check-d">{{trans('front.french')}}</label>
    </div>
</div>

<div class="dashboard-list-box margin-top-10">
    <h4 class="gray">{{ __('front.where_did_you_see_us') }}</h4>
    
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input id="check-e" type="checkbox" name="where_you_see_us[]" value="Facebook" @if(isset($useUs) && is_array($useUs) && in_array("Facebook",$useUs)) checked @endif>
        <label for="check-e">{{trans('front.Facebook')}}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input id="check-f" type="checkbox" name="where_you_see_us[]" value="Billboard" @if(isset($useUs) && is_array($useUs) && in_array("Billboard",$useUs)) checked @endif>
        <label for="check-f">{{trans('front.Billboard')}}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input type="checkbox" name="where_you_see_us[]" id="check-g" value="Print" checked >
        <label for="check-g">{{ __('front.Print advertisement') }}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input type="checkbox" name="where_you_see_us[]" id="check-h" value="TV" @if(isset($useUs) && is_array($useUs) && in_array("TV",$useUs)) checked @endif>
        <label for="check-h">{{ __('front.TV') }}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input type="checkbox" name="where_you_see_us[]" id="check-i" value="Newsletter" @if(isset($useUs) && is_array($useUs) && in_array("Newsletter",$useUs)) checked @endif>
        <label for="check-i">{{ __('front.Newsletter') }}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input type="checkbox" name="where_you_see_us[]" id="check-j" value="Google" @if(isset($useUs) && is_array($useUs) && in_array("Google",$useUs)) checked @endif>
        <label for="check-j">{{ __('front.Google') }}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input type="checkbox" name="where_you_see_us[]" id="check-k" value="YouTube" @if(isset($useUs) && is_array($useUs) && in_array("YouTube",$useUs)) checked @endif>
        <label for="check-k">{{ __('front.YouTube') }}</label>
    </div>
    <div class="checkboxes in-row margin-bottom-18" style="background:white;padding:10px">						
        <input type="checkbox" name="where_you_see_us[]" id="check-l" value="Flyer" @if(isset($useUs) && is_array($useUs) && in_array("Flyer",$useUs)) checked @endif>
        <label for="check-l">{{ __('front.Flyer') }}</label>
    </div>
</div>

<div class="dashboard-list-box margin-top-10">
    <h4 class="gray">{{ __('front.instagram_user_name') }}</h4>
    <div class="dashboard-list-box-static" style="padding-top: 20px">
        <input id="instagram_user_name" name="instagram_user_name" value="{{$client['instagram_user_name']}}" class="form-control" type="tel">
    </div>
</div>

<div class="dashboard-list-box margin-top-10">
    <h4 class="gray">{{ __('front.who_are_you') }}</h4>
    <div class="dashboard-list-box-static" style="padding-top: 25px">
        <textarea id="who_are_you" name="who_are_you"  class="form-control"  rows="8" cols="33" >{{$client['who_are_you']}}</textarea>
    </div>
</div>


