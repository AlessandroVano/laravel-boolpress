@component('mail::message')
# You got a new contact email

**Name:**  {{ $contact['name'] }}
**Email:**  {{ $contact['email'] }}
**Message:**  {{ $contact['message'] }}

@component('mail::button', ['url' => ''])
Visit Support
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent