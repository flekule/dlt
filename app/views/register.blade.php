@extends('users.layouts.default')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>SimuTrack</title>
<link href="{{'_css/main.css'}}" rel="stylesheet" media="screen, projection">
<meta name="viewport" content="initial-scale=1.0" />
</head>

<body>
@section('content')

<header>

  <nav id="pageNav" class="cf">

  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">
    <h1>Sign Up!</h1>
    <article class="post">
      <h2>SimuTrack Registration</h2>
      <div id="main">



                  <fieldset>
                  {{Form::open(array('url'=>'register'))}}
                       <label for="firstname">Firstname:</label><input type="text" name="firstname" id="firstname" /><br />
                        <label for="surname">Surname:</label><input type="text" name="surname" id="surname" /><br />

                        <label for="email">Email:</label><input type="email" name="email" id="email" /><br />
                      <label for="password">Password:</label><input type="password" name="password" id="password" /><br />

                      <label for="imei">IMEI:</label><input type="number" name="imei" id="imei" /><br />

                  {{Form::submit('Register')}}
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
