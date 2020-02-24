@extends('template/main')
@section('title_text')
    Le site pour apprendre les bases de la création d'un site !
@endsection
@section('content')
    <h1>Admin</h1>
    <div>
        <a href="{{ route('chap') }}">Ajouter un chapitre</a>
        <a href="{{ route('cours') }}">Ajouter un cours</a>
        <a href="{{ route('listusers') }}">Liste des membres et modification</a>
    </div>
@endsection