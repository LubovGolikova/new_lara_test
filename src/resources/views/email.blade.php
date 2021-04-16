@component('mail::message', ['data' => $data])
    @foreach($data as $dat)
        **{{$dat}}**,  {{-- use double space for line break --}}
    @endforeach
    Thank you for choosing Mailtrap!
@endcomponent
