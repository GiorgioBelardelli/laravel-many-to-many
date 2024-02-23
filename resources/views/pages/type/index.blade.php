@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>TYPES</h1>
    <ul>
        @foreach($types as $type)
        <li>
            <h3>
                {{ $type -> type_name }}
            </h3>
        </li>
        @endforeach
    </ul>
@endsection