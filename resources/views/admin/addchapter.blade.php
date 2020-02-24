@extends('template/main')
@section('title_text')
    Le site pour apprendre les bases de la création d'un site !
@endsection
@section('content')
    <h1>Admin</h1>
    <h2>Ajouter un chapitre à un cours :</h2>
    <div class="add-chap-bloc">
        
        <div class="add-chap-flex-option">
            <select class="add-chap-select" name="cours">
                <option value="">Cours</option>
                @foreach ($menu as $m)
                    <option value="{{ $m->nom_cours }}">{{ $m->nom_cours }}</option>
                @endforeach
            </select>
            <span class="option-code code-code">[Code]</span>
            <span class="option-code code-balise">[Balise]</span>
            <span class="option-code code-titre">[Titre]</span>
            <span class="option-code code-p">[Paragraphe]</span>
            <span class="option-code code-resume">[Résumé]</span>
        </div>
        <textarea name="content" id="content-chap" cols="30" rows="10"></textarea>
        <p class="error"></p>
        <div class="button-flex">
            <button route="{{ route('AddChap') }}" class="send-chap-data">ENVOYER</button>
            <button class="add-chap-showoutput">APERÇU</button>
        </div>
        

        <div class="add-chap-hidden">
            <div class="flex-output">
            <div class="output"></div>
            </div>
        </div>
        
    </div>
    <a href="{{ route('Admin') }}" class="link-txt">Retour</a>
    <script src="{{ asset('js/addchap.js') }}"></script>
@endsection