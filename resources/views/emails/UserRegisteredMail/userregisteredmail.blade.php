@component('mail::message')
# Welcome To UserRegisteredMail Class Mailable

This is the body of your message. View views.emails.UserRegisteredMail.userregisteredmail to edit and update mail

@component('mail::button', ['url' => url('/')])
Visit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
