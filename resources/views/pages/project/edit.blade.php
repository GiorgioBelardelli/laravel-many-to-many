@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>MODIFICA PROGETTO</h1>
    <form action="{{ route('project.store') }}"
    method="POST">

    @csrf 
    @method('POST')

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $project -> title }}">
        <br>
        <label for="description">Descrizione</label>
        <input type="text" name="description" id="description" value="{{ $project -> description }}">
        <br>
        <label for="type_id">Seleziona il tipo:</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
            <option value="{{ $type -> id }}">
                {{ $type -> type_name}}
            </option>
            @endforeach
        </select>
        <br>
        <span>TECHNOLOGIES:</span>
        <br>
        @foreach($technologies as $technology)
            <input type="checkbox"
            name="technology_id[]"
            id="{{ 'technology_id_' . $technology -> id }}"
            value="{{ $technology -> id }}">
            <label for="{{ 'technology_id_' . $technology -> id }}">
                {{ $technology -> technology_name }}
            </label>
            <br>
        @endforeach
        <input type="submit" value="CREA">
    </form>
@endsection