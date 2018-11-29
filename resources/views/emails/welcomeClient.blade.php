@component('mail::message')
# Hola {{$client->name}} 

Gracias por tu visita a Mexquite Restaurant, esperamos que hay sido de tu agrado.
Suscribete a nuestra alerta de promociones y recibiras las mejores ofertas por parte de nuestra cuenta. ¡Te esperamos!

Gracias,<br>
{{ config('app.name') }}
@endcomponent