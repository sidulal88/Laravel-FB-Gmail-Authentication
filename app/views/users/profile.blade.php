@extends('layout.main')

@section('body-content')

	<h1>Profile View</h1>
	
<table class="table">
	<tbody>
	<tr>
		<td>Name</td>
		<td>{{ $user->name }} </td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{ $user->email }} </td>
	</tr>
	<tr>
		<td>User Name</td>
		<td>{{ $user->username }} </td>	</tr>
    </tbody>
@stop