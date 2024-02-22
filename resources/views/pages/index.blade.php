@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>PROJECTS</h1>
    <ul>
        @foreach($projects as $project)
        <li>
            <h3>
                {{ $project -> title }}
            </h3>
            
            <p>
                {{ $project -> description }}
            </p>
        </li>
        @endforeach
    </ul>
@endsection
