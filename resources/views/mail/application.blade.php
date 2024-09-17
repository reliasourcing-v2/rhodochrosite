<x-mail::message>
# Hello <b>Admin</b>,
<br>

A recent application has landed in your inbox, including its details. Please find below the specifics of the application for your review.
<br>

<b>Career Application Details:</b><br>

Full Name: {{ $full_name }}<br>
Phone Number: {{ $phone }}<br>
Email Address: {{ $email }}<br>
Position: {{ $position }}<br>
<br>
Cover Letter: <br>
<span style="white-space: pre-wrap;">{{ $message }}</span><br>
<br>
<br>
<a href="{{ $cv }}">View CV</a>
<br>
Your timely response is greatly appreciated.<br>
<br>
Thank you.
<br>
<br>
{{ config('app.name') }}
</x-mail::message>