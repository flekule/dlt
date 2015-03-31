@foreach($users as $user)

    <h1>{{ $user->firstname . ' ' . $user->surname }}</h1>

@endforeach