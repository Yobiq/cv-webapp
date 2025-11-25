@extends('app')

@section('content')
    @include('componants.contact-form', [
        'contact' => $contact ?? [],
        'socials' => $socials ?? [],
    ])
@endsection
