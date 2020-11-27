<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paypal Integration Test</title>
</head>
<body>
	<form class="paypal" action="{{route('redirectToPayp')}}" method="post" id="paypal_form" target="_blank">
        @csrf

        <input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />

	    <input type="hidden" name="item_name" value="PRODUCT CAMERA">
        <input type="hidden" name="currency_code" value="USD" />

        <input type="hidden" name="first_name" value="Customer's First Name"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input type="hidden" name="payer_email" value="customer@example.com"  />
		<input type="hidden" name="item_number" value="<?php echo uniqid(); ?>" />
		<input type="submit" name="submit" value="Submit Payment"/>
	</form>
</body>
</html>
