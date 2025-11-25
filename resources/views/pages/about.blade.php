@extends('app')

@section('content')
    @include('componants.about', ['about' => $about ?? []])
@endsection
