
@component('mail::message')

Hi here is you Receipt #00001

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

@component('mail::button', ['url' => 'https://www.rfi.fr/km'])
View Your Renting
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent