@component('mail::message')
        ## Welcome to Health-Clinic _{{$name}}_ !

Jesteśmy zespołem lekarzy i terapeutów z kilkuletnim doświadczeniem.
Zdobywaliśmy wiedzę w renomowanych placówkach na terenie całego kraju.
Specjalizujemy się w osteopatycznym diagnozowaniu i leczeniu wszelkich zaburzeń funkcjonalnych w organizmie.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login Page
@endcomponent

Name: **{{$name}}**<br>
Login: _{{$login}}_ <br>

Dziękujemy że nam zaufałeś,<br>
_David Olivier Thomas Jablonsky_
{{--{{ config('app.name') }}--}}
@endcomponent
