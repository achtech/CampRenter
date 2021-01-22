<!DOCTYPE html>
<html>
   <head>
      <title> {{trans('front.welcome_camp_unit')}}</title>
   </head>
   <body>
      <img src="{{asset('images/logo-icon.png')}}"  alt="">
      <br/>
      <h2>{{trans('front.welcome_camp_unit')}}</h2>
      <br/>
      {{trans('front.hi')}} {{$client['client_name']}}  {{$client['client_last_name']}}
      <br/>
      {{trans('front.confirm_registration')}}
      <br/>
      <a type="submit" class="btn" style="background-color: #4cbed2;border-color: #4cbed2;margin-left: 183px;height: 45px !important;border-radius: 24px;" href="{{ route('home.index') }}">
      {{trans('front.confirm_email_address')}}
      </a>
      <br/>
      {{trans('front.question_case')}} <a href="mailto:support@campunite.com">support@campunite.com</a>
      {{trans('front.contact_us')}}
      <br/>
      {{trans('front.best_regards')}}
      <br/>
      {{trans('front.camp_team')}}
   </body>
</html>
