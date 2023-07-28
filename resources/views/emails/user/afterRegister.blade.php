<x-mail::message>
# Welcome!

Hi {{$user->username}}
<br>
Selamat datang di aksawiyata, akun kamu telah berhasil dibuat, Sekarang kamu dapat memilih posisi magang sesuai keinginanmu.

<x-mail::button :url="$url">
Sign In
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
