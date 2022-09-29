@component('mail::message')
# Olá teste

aqlas coisas 

##Titulo 1

##Titulo2

@component('mail::button', ['url' => 'http://uol.com.br'])
UOL
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
