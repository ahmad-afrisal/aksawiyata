<x-mail::message>
# Pendafataranmu telah disetujui

Hi {{$checkout->User->name}}
<br>
Pendaftaranmu pada posisi <b>{{$checkout->Job->name}}</b> di <b>{{$checkout->Job->Company->name}}</b> menunggu persetujuanmu.

<x-mail::button :url="$url">
Dashboard
</x-mail::button>

Terima Kasih,<br>
{{ config('app.name') }}
</x-mail::message>
