<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <title>
    @if(isset($title)) 
    {{ $title }}
    @else
    BINFY
    @endif
  </title>

  {{ HTML::style('css/bootstrap.min.css') }}
  {{ HTML::style('css/font-awesome.css') }}
  {{ HTML::style('css/style.css') }}


</head>
<body>


  <header id="header" class="wrapper">
     @include('layout.nav')
    <!-- //container -->
  </header>
@if(Session::has('message'))
   <div class="alert alert-{{ Session::get('message_type') }}">
    <span type="button" class="close" data-dismiss="alert">&times;</span>
    <strong> {{ Session::get('message') }}</strong>
  </div>
  @endif
  <div class="container">
    @yield('body-content')
    </div>
  

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  {{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>
