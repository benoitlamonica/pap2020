@extends('template/main')
@section('title_text')
    {{ $nomCours }} | Chapitre {{ $nChap }}
@endsection
@section('content')
<h1>{{ $nomCours }}</h1>
<h4>Timeline :</h4>
<div class="chap-timeline">
    @for ($i = 1; $i <= $nbChap; $i++)
        <a href="{{ url('cours/'.$nomCours.'/'.$i) }}" class="chap-timeline-select {{ $i == $nChap ? 'chap-selected' : '' }}"></a>
    @endfor
</div>
{!! $content !!} 
<div class="chap-select">
    @if($nChap - 1 == 0 && $nChap + 1 > $nbChap)
    @elseif ($nChap - 1 == 0) <a href="{{ url('cours/'.$nomCours.'/'.($nChap + 1)) }}">Chapitre suivant</a>
    @elseif ($nChap + 1 > $nbChap) <a href="{{ url('cours/'.$nomCours.'/'.($nChap - 1)) }}">Chapitre Précédent</a>
    @else <a href="{{ url('cours/'.$nomCours.'/'.($nChap - 1)) }}">Chapitre Précédent</a><a href="{{ url('cours/'.$nomCours.'/'.($nChap + 1)) }}">Chapitre suivant</a>
    @endif
</div>
@endsection