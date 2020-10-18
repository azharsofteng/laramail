@component('mail::message')
# Cy

<strong>Email : </strong> {{ $data['email'] }} <br>
<strong>Name : </strong> {{ $data['name'] }} <br>
<strong>Subject : </strong> {{ $data['subject'] }} <br>

<strong>Message : </strong> {{ $data['message'] }} <br>


@endcomponent