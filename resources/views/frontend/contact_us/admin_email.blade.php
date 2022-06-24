<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h2>Hey !</h2> <br><br>

You received an Contact Enquiry email from : {{ $first_name }}{{ $last_name }} <br><br>

User details: <br><br>

Name:  {{ $first_name }}{{ $last_name}}<br>
Email:  {{ $email }}<br>
Phone:  {{ $phone }}<br>
Subject:  {{ $contact_subject }}<br>
Message:  {!! $contact_message !!}<br><br>

Thanks
</body>
</html>