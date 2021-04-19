@component('mail::message', ['data' => $data])
    @foreach($data as $datum)
        **{{$datum}}**,  {{-- use double space for line break --}}
    @endforeach
    Sincerely yours, our team!
@endcomponent
