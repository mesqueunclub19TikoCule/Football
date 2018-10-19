@component('mail::message')

    @component('mail::panel')
        You have received a letter from: {{ $data['name'] }}
    @endcomponent

    @component('mail::panel')
        Sender's email address: {{ $data['email'] }}
    @endcomponent

    @component('mail::panel')
        {{ $data['date'] }}
    @endcomponent

@endcomponent