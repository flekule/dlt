@extends('users.layouts.default')

@section('content')
<h1>Fill this contact form to get in touch with us</h1>

{{ HTML::ul($errors->all(), array('class'=>'errors')) }}

{{ Form::open(array('url' => 'contact')) }}

<div>{{ Form::label('Name') }}
{{ Form::text('name', 'Enter Your Name') }}</div>
<div>{{ Form::label('Subject') }}
{{ Form::text('subject', 'Enter Your Subject') }}</div>
<div>{{ Form::label('Message') }}</div>
<div>
{{ Form::textarea('message', 'Enter Your Message') }}</div>

{{ Form::submit('Submit') }}
{{ Form::close() }}
@stop