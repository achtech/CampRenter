<!DOCTYPE html>
<html>
<head>
    <title> {{trans('front.forget_password')}}</title>
</head>

<body>
    <img src="{{asset('frontend/asset/images/logo-icon.png')}}"  alt="">
    <br/>

{{trans('front.hi')}} {{$client['client_name']}}  {{$client['client_last_name']}}
<br/>
{{trans('front.button_reset_pass')}}

<br/>
<a type="submit" class="btn" style="background-color: #4cbed2;border-color: #4cbed2;margin-left: 183px;height: 45px !important;border-radius: 24px;" href="{{ route('frontend.client.show',$client['id']) }}">
    {{trans('front.confirm_email_address')}}
 </a>
 {{trans('front.ignore_message_reset_pass')}}  
  <br/>
 {{trans('front.best_regards')}} 
<br/>
 {{trans('front.camp_team')}} 
</body>

</html>