<x-mail::message>
# Hello <b>Admin</b>,
<br>

A recent inquiry has landed in your inbox, including its details. Please find below the specifics of the inquiry for your review.
<br>

<b>Inquiry details:</b><br>

Interested Solutions: {{ $solution }}<br>
Roles to Outsource: {{ $role }}<br>
Full Name: {{ $full_name }}<br>
Company: {{ $company }}<br>
Position: {{ $position }}<br>
Industry: {{ $industry }}<br>
Email Address: {{ $email }}<br>
Phone Number: {{ $phone }}<br>
<br>
<br>
<br>
Your timely response is greatly appreciated.<br>
<br>
Thank you.
<br>
<br>
{{ config('app.name') }}
</x-mail::message>