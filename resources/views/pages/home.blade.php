@extends('app')

@section('content')
    @include('componants.hero', ['hero' => $hero ?? []])
@endsection
