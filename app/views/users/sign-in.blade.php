@extends('layout.admin_main')

@section('body-content')

<!-- <table class="table">
	<tbody>
	
	<tr>
		<td align="right">Email</td>
		<td>{{ Form::text('email') }}

		@if($errors->has('email'))
					{{ $errors->first('email') }}
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
		<td align="right"> {{ Form::checkbox('remember') }} </td>
		<td><label for="remember">Remember</label></td>
	</tr>
	
    <tr>
		<td></td>
		<td>{{ Form::submit('Sign In') }}</td>
	</tr>
    </tbody> -->

              <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       {{ Form::open(array('route' => array('user-sign-in-post'))) }} 
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop