<x-mail::message>
# Pendafataran pada posisi {{$checkout->Job->name}}

Hi {{$checkout->User->Student->nama_mhs}}
<br>
Terima kasih telah melakukan pendaftaran pada {{$checkout->Job->name}}, untuk informasi lebih lanjut kami akan segera mengabari anda

<x-mail::button :url="$url">
Dashboard
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
