
{{ HTML::style('css/bootstrap.min.css') }}
<link rel="stylesheet" type="text/css" href="css/zocial.css" />
<link href='http://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Please Sign In</h3>
        </div>
        <div class="panel-body">
         {{ Form::open(array('route' => array('user-sign-in-post'))) }} 
         <fieldset>


           <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="email" placeholder="email address">

          </div>
          <span class="help-block"> @if($errors->has('email'))
            {{ $errors->first('email') }}</span>
            @endif
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input  type="password" class="form-control" name="password" placeholder="Password">

            </div>
            <span class="help-block">
              @if($errors->has('password'))
              {{ $errors->first('password') }}
              @endif</span>
              <div style="margin-top:10px" class="form-group">

                <div class="col-sm-10 controls">
                  <input class="btn btn-success btn-block" name="submit" type="submit" value="Login">
                  <a id="btn-fblogin" href="{{ URL::route('facebookAuth') }}" class="btn btn-primary btn-block">
                    <i class="fa fa-facebook"></i> | Login with Facebook</a>

                    <a id="btn-fblogin" href="{{ URL::route('gmailAuth') }}" class="btn btn-primary btn-block">
                    <i class="fa fa-google-plus"></i> | Login with Google</a>

                    </div>
                  </div></fieldset>
                  {{ Form::close() }}
                </div>
              </div>
            </div>          
          </div>
        </div>

