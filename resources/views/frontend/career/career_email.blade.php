
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<h2>Hello,{{ $name }}</h2>

<p> We Received Your Email </p>
<b>Here Is Your Detail</b>
 <table border="1px ">
	<thead>
		<th>Name</th>
		<th>Email</th>
		<th>Message</th>
		<th>Subject</th>
		<th>Phone</th>
		<th>Position</th>
	</thead>
	<tbody>	
		<tr>
		
		<td>{{$name}}</td>
		<td>{{$email}}</td>
		<td>{{$career_message}}</td>
		<td>{{$career_subject}}</td>
		<td>{{$phone}}</td>
		<td>{{$position}}</td>

		</tr>
	</tbody>
</table>

<p>Out Team Will Contact you soon</p>

Thank You for visting Handyconnect.
</body>
</html>
