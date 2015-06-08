@extends('layout.main')

@section('body-content')

{{ Form::open(array('route' => array('put-user-update', $user->id), 'method'=>'put')) }} 


<div class="panel panel-default">
	<div class="panel-heading">
		User Update
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form role="form">
					<div class="form-group">
						<label>Name</label>
						{{ Form::text('name', $user->name, array('class'=>'form-control')) }}

						@if($errors->has('name'))
						<button type="button" class="btn btn-warning">{{ $errors->first('name') }}</button>

						@endif
					</div>
					<div class="form-group">
						<label>Contact Info</label>
						{{ Form::text('contact', $user->contact, array('class'=>'form-control')) }}</div>


						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>

			</div>
			<!-- /.col-lg-6 (nested) -->
		</div>
		<!-- /.row (nested) -->
	</div>
	<!-- /.panel-body -->
</div>

{{ Form::close() }}

@stop