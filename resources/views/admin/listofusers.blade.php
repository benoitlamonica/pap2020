@extends('template/main')
@section('title_text')
    Le site pour apprendre les bases de la création d'un site !
@endsection
@section('content')
    <h1>Admin</h1>
    <h2>Liste des membres :</h2>
    <div class="member-list-bloc">
        @foreach ($member as $m)
            <div class="member-list-flex">
                <span class="member-name">{{ $m->name }}</span>
                <span class="{{ $m->rights == 1 ? 'member-rights-admin' : 'member-rights-member' }}">{{ $m->rights == 1 ? 'Admin' : 'Membre' }}</span>
                <span class="member-mail">{{ $m->email }}</span>
                <button class="btn member-button">X</button>
            </div>
        @endforeach
    </div>
    <a href="{{ route('Admin') }}" class="link-txt">Retour</a>
    <script src="{{ asset('js/member.js') }}"></script>
@endsection