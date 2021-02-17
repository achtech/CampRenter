<!DOCTYPE html>
<html>
<head>
    <title> Camper ofirmation</title>
</head>

<body>
    <h2>{{trans('front.welcome_camp_unit')}}</h2>
    <br/>
    {{trans('front.hi')}} {{$owner['client_name']}}  {{$owner['client_last_name']}}
    <br/>
    <p>Your camper named: {{$camper['camper_name']}} has been confirmed by Campunite team.</p>
    <br/>
    <p>{{trans('front.question_case')}} <a href="mailto:support@campunite.com">support@campunite.com</a>{{trans('front.contact_us')}}</p>
    <br/>
    <p>{{trans('front.best_regards')}}</p>
    <br/>
    <p>{{trans('front.camp_team')}}</p>
</body>

</html>
