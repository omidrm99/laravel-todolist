@extends('layouts.format')

@section('content')
    @include('form', ['task = $task'])
@endsection
