<x-mail::message>
# Hello,
<br>

A recent computation has landed in your inbox, including its details. Please find below the specifics of the computation for your review.
<br>

<b>Computation Details:</b><br>

Email Address: {{ $email }}<br>
<br>
<a href="{{ $pdf }}">View computation file</a>
<br>
Thank you.
<br>
<br>
{{ config('app.name') }}
</x-mail::message>