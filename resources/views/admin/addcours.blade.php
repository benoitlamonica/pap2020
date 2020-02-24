@extends('template/main')
@section('title_text')
    Le site pour apprendre les bases de la création d'un site !
@endsection
@section('content')
    <h1>Admin</h1>
    <h2>Ajouter un cours :</h2>
    <div>
        <p>Nom du cours :</p>
        <input class="add-cours-input" type="text" name="name">
        <button addchap="{{ route('chap') }}" route="{{ route('Addcours') }}" class="btn add-cours-btn">Envoyer</button>
        <p class="error"></p>
    </div>
    <h2>Liste des cours :</h2>
    <div class="add-cours-list">
        @if(count($menu) == 0) <p>Aucun cours !</p>@endif
        @foreach ($menu as $m)
            <div class="add-cours-list-cour">
                <span class="add-cours-nomcours">{{ $m->nom_cours }}</span>
                <button route="{{ route('deletecours') }}" idcours="{{ $m->id }}" class="delete-cours">X</button>
            </div>
        @endforeach
    </div>
    <a href="{{ route('Admin') }}" class="link-txt">Retour</a>
    <script src="{{ asset('js/addcours.js') }}"></script>
@endsection