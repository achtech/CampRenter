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
      {{trans('front.hi')}} {{$owner['client_name']}}  {{$owner['client_last_name']}}
      <br/>
      <p>The payment for booking your camper: {{$camper}} has been successful.</p>
      <br/>
      <p>{{trans('front.question_case')}} <a href="mailto:support@campunite.com">support@campunite.com</a>{{trans('front.contact_us')}}</p>
      <br/>
      <p>{{trans('front.best_regards')}}</p>
      <br/>
      <p>{{trans('front.camp_team')}}</p>
   </body>
</html>
