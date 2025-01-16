<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display Records</title>
</head>
<body>
	<table  border="1" cellpadding="10" cellspacing="0" align="center">
		@if (session('status'))

		<tr>
			<td colspan="11" align="center">
				{{ session('status') }}
			</td>
		</tr>
		@endif
		<tr>
			<td>Id</td>
			<td>Firstname</td>
			<td>Lastname</td>
			<td>Email</td>
			<td>Password</td>
			<td>Gender</td>
			<td>Address</td>
			<td>City</td>
			<td>Photo</td>
			<td>Hobbies</td>
			<td>Action</td>						
		</tr>
		@foreach($ragister as $row)	
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->firstname }}</td>
			<td>{{ $row->lastnmae }}</td>
			<td>{{ $row->email }}</td>
			<td>{{ $row->password }}</td>
			<td>{{ $row->gender }}</td>
			<td>{{ $row->address }}</td>
			<td>{{ $row->city }}</td>
			<td>
				@if($row->photo!="")
					<img src="/uploads/{{ $row->photo }}" width="200" />
				@endif	
			</td>
			<td>{{ $row->hobbies }}</td>
			<td>
				<a href="/ragister/edit/{{ $row->id }}">Edit</a>
				<a href="/ragister/edit/{{ $row->id }}">Edit</a>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>