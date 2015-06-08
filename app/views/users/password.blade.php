@extends('layout.main')

@section('body-content')

	<h1>Change Password</h1>

	{{ Form::open(array('route' => array('user-change-password-post'))) }} 
<table class="table">
	<tbody>
	
	<tr>
		<td align="right">Old Password</td>
		<td>{{ Form::password('oldpassword') }}

		@if($errors->has('oldpassword'))
					{{ $errors->first('oldpassword') }}
		@endif

		</td>
	</tr>
	<tr>
		<td align="right">Password</td>
		<td>{{ Form::password('password') }}

		@if($errors->has('password'))
					{{ $errors->first('password') }}
		@endif

		</td>
	</tr>
	<tr>
		<td align="right">Re-Password</td>
		<td>{{ Form::password('password_again') }}

		@if($errors->has('password_again'))
					{{ $errors->first('password_again') }}
		@endif

		</td>
	</tr>
	
	
    <tr>
		<td></td>
		<td>{{ Form::submit('Change Password') }}</td>
	</tr>
    </tbody>
    
{{ Form::close() }}

@stop