<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Form</title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data" action="/register/insert">
			<table border="0" align="center">
				<tr>
					<td>Enter First Name</td>
					<td>
						<input type="text" name="firstname" placeholder="Enter Your First Name" size="20" maxlength="10" value="{{ 
							$row->fistname }}" />
					</td>
				</tr>
				<tr>
					<td>Enter Last Name</td>
					<td>
						<input type="text" name="lastname" placeholder="Enter Your Last Name" size="20" maxlength="20" value="{{ 
							$row->lastname }}"/>
					</td>
				</tr>
				<tr>
					<td>Enter Email Id</td>
					<td>
						<input type="email" name="email" placeholder="Enter Your Email" size="50" maxlength="100" value="{{ 
							$row->email }}"/>
					</td>
				</tr>
				<tr>
					<td>Enter Password</td>
					<td>
						<input type="password" name="password" placeholder="Enter Your Password" size="50" maxlength="50" value="{{ 
							$row->password }}"/>
					</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" value="Male"  @if($row["gender"]=="Male"){{ 'checked' }} @endif/> Male
						<input type="radio" name="gender" value="Female"  @if($row["gender"]=="Female"){{ 'checked' }} @endif/> Female
					</td>
				</tr>
				<tr>
					<td valign="top">Address</td>
					<td>
						<textarea rows="6" cols="50" name="address" placeholder="Enter Your Address">{{ $row->address }}</textarea>
					</td>
				</tr>
				<tr>
					<td valign="top">City</td>
					<td>
						<select name="city">
							<option value="">-Select-</option>
							@php
								foreach($city as $v){
									$selected = "";
									
									if($row["city"]==$v){
										$selected = "selected";
									}
							@endphp
							<option value="{{ $v }}" {{ $selected }}>{{ $v }}</option>
							@php
								}
							@endphp
						</select>
					</td>
				</tr>
				<tr>
					<td>Select Your Photo</td>
					<td>
						<input type="file" name="photo" />
						@if($row["photo"]!="")
						<img src="/uploads/{{ $row->photo }}" height="150" width="150" alt="" />
						@endif
					</td>
				</tr>
				<tr>
					<td>Hobbies</td>
					<td>
						@php
							$hobbies = array();
							
							if($row["hobbies"]!=""){
								$hobbies = explode(",",$row["hobbies"]);
							}
						@endphp
						<input type="checkbox" name="hobbies[]" value="cricket" @if(in_array("cricket",$hobbies)){{ 'checked' }} @endif /> Cricket
						<input type="checkbox" name="hobbies[]" value="hockey" @if(in_array("hockey",$hobbies)){{ 'checked' }} @endif /> Hockey
						<input type="checkbox" name="hobbies[]" value="chess" @if(in_array("chess",$hobbies)){{ 'checked' }} @endif /> Chess
						<input type="checkbox" name="hobbies[]" value="football" @if(in_array("cricket",$hobbies)){{ 'checked' }} @endif /> Football
						<input type="checkbox" name="hobbies[]" value="kabaddi" @if(in_array("cricket",$hobbies)){{ 'checked' }} @endif /> Kabaddi
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="{{ $row->id }}" />
						<input type="hidden" name="hdn_photo" value="{{ $row->photo }}" />
						@csrf
						<input type="submit" name="editrecord" value="Update" />
					</td>	
				</tr>
			</table>
		</form>
	</body>
</html>