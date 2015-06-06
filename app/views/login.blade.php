@extends('users.layouts.default')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>SimuTrack</title>
<link href="{{'_css/main.css'}}" rel="stylesheet" media="screen, projection">
<meta name="viewport" content="initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
@section('content')

<header>

  <nav id="pageNav" class="cf">

  </nav>
</header>

<div id="contentWrapper">
   <article id="mainContent">
    <h1>Log In</h1>
    <article class="post">

      <div id="main">


                   <form>
                  <fieldset>
                  {{Form::open(array('url'=>'login2'))}}
                   <p>
                  {{$errors->first('email')}}
                  {{$errors->first('password')}}
                 </p>
                 <p>
                 {{Form::label('email', 'Email Address')}}
                 {{Form::text('email', Input::old('email'), array('placeholder' =>'youremail@address.com'))}}
                 </p>
                 <p>
                 {{Form::label('password', 'Password')}}
                 {{Form::password('password')}}
                 </p>
                    {{Form::submit('Submit')}}
                    {{Form::close()}}




                  </fieldset>
              </form>


      </div>

</article>
  </article>

</div>
@stop
</body>
</html>
