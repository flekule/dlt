<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <style>
        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:left;
            color: #000000;
            background: #DADADA;
            left: 50%;
            top: 50%;
        }
    </style>
</head>
<body>

<form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
    <fieldset>
        @if (Cache::remember('username_in_confide', 5, function() {
            return Schema::hasColumn(Config::get('auth.table'), 'username');
        }))

        @endif

            <div class="form-group">
                <label for="firstname">{{{ ucwords('first Name') }}}
                </label>
                <input class="form-control" placeholder="{{{ ucfirst('first name') }}}" type="text"
                       name="firstname" id="firstname" value="{{{ Input::old('firstname') }}}">
            </div>

            <div class="form-group">
                <label for="surname">{{{ ucwords('surname') }}}
                </label>
                <input class="form-control" placeholder="{{{ ucfirst('surname') }}}" type="text"
                       name="surname" id="surname" value="{{{ Input::old('surname') }}}">
            </div>

            <div class="form-group">
            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}
                <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small>
            </label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text"
                   name="email" id="email" value="{{{ Input::old('email') }}}">
        </div>
        <div class="form-group">
            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password"
                   name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}"
                   type="password" name="password_confirmation" id="password_confirmation">
        </div>

        <div class="form-group">
            <label for="imei">{{{ ucwords('imei') }}}
            </label>
            <input class="form-control" placeholder="{{{ ucfirst('Dial *#06# to get your imei') }}}" type="text"
                   name="imei" id="imei" value="{{{ Input::old('imei') }}}">
        </div>


        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">
                @if (is_array(Session::get('error')))
                    {{ head(Session::get('error')) }}
                @endif
            </div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{ Session::get('notice') }}</div>
        @endif

        <div class="form-actions form-group">
            <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
        </div>

    </fieldset>
</form>
</body>
</html>