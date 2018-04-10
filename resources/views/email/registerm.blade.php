@component('mail::message')
# Beinvenue {{ $user->name }}

Ton inscription a bien été validé!

@component('mail::button', ['url' => config('app.url')])
Aller sur {{ config('app.name') }}
@endcomponent


@component('mail::panel')
Je suis un message important.
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
