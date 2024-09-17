<x-mail::message>
# Hello <b>Admin</b>,
<br>

A recent inquiry has landed in your inbox, including its details. Please find below the specifics of the inquiry for your review.
<br>

<b>Inquiry details:</b><br>

Full Name: {{ $full_name }}<br>
Phone Number: {{ $phone }}<br>
Email Address: {{ $email }}<br>
Company: {{ $company }}<br>
<br>
Message: <br>
<span style="white-space: pre-wrap;">{{ $message }}</span><br>
<br>
<br>
Your timely response is greatly appreciated.<br>
<br>
Thank you.
<br>
<br>
{{ config('app.name') }}
</x-mail::message>