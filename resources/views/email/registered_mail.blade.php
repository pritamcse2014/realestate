@component('mail::message')
    Hi, {{ $save->username }} . Please New Account Pasword Set.
    <p>It Happens, Click the Link Below....</p>
    @component('mail::button', ['url' => url('setNewPassword/' .$save->remember_token)])
        Set Your Password
    @endcomponent
    Thank You....
@endcomponent