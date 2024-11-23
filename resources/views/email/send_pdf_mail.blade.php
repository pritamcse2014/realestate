@component('mail::message')
    <br>
    <p><b>Email : - </b>{{ $user->email }}</p>
    <p><b>Subject : - </b>{{ $user->subject }}</p>
    <p><b>Message : - </b>{{ $user->message }}</p>
    Thank You.
    <br>
@endcomponent