@extends('app')

@section('content')
    @include('componants.project-list', ['projects' => $projects ?? []])
@endsection
