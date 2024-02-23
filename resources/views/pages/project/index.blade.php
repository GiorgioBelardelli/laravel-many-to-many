@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>PROJECTS</h1>
    <a href=" {{ route('project.create') }}">
        CREA NUOVO PROGETTO
    </a>
    <ul>
        @foreach($projects as $project)
        <li>
            <h3>
                {{ $project -> title }}
            </h3>
            [<i> {{ $project -> type -> type_name }} </i>]
            <p>
                {{ $project -> description }}
            </p>
            @foreach ($project -> technologies as $technology )
            <span>Technology:</span>
            <strong> {{ $technology -> technology_name}} </strong>
            @endforeach
            <br>
            <a href="{{ route('project.edit', $project -> id )}}">
                EDIT
            </a>
        </li>
        @endforeach
    </ul>
@endsection