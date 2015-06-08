@extends('layout.main')

@section('body-content')

	<h1>User Sign In</h1>
{{ Form::open(array('route' => array('user-forgot-password-post'))) }} 
<table class="table">
	<tbody>
	
	<tr>
		<td align="right">Email</td>
		<td>{{ Form::text('email') }}

		@if($errors->has('email'))
					{{ $errors->first('email', Input::old('email')) }}
		@endif

		</td>
	</tr>	
	
    <tr>
		<td></td>
		<td>{{ Form::submit('Reset Password') }}</td>
	</tr>
    </tbody>
    
{{ Form::close() }}

@stop