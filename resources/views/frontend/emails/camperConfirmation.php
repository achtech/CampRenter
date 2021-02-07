<!DOCTYPE html>
<html>
<head>
    <title> {{trans('front.forget_password')}}</title>
</head>

<body>
    <img src="{{asset('images/logo-icon.png')}}"  alt="">
    <br/>

{{trans('front.hi')}}
<br/>
<p>You a request to confirm the camper: {{$camper['camper_name']}} from: {{$client['client_name']}}  {{$client['client_last_name']}}</p>
</body>

</html>
