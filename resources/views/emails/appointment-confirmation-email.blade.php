@component('mail::message')
        ## This is confirmation of your appointment _{{$name}}_ !

Jesteśmy zespołem lekarzy i terapeutów z kilkuletnim doświadczeniem.
Jeśli widzisz tę wiadomość, to znaczy, że twoja wizyta została potwierdzona.

**Szczegóły wizyty**<br>
Data: {{$date}}<br>
Godzina: {{$hour}}<br>
Specialista {{$specializationName}}: Doktor {{$doctorName}} {{$doctorSurname}}<br>

Dziękujemy że nam zaufałeś,<br>
_David Olivier Thomas Jablonsky_
    {{--{{ config('app.name') }}--}}
@endcomponent