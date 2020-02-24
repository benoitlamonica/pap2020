@extends('template/main')
@section('title_text')
    Le site pour apprendre les bases de la création d'un site !
@endsection
@section('content')
    
    <h1>{{ Auth::check() ? 'Bienvenue sur $cratch '.Auth::user()->name.' !' : 'Bienvenue sur $cratch !' }}</h1>
    <p>
        Mes amis, laissez moi vous expliquer le pourquoi du comment de $cratch. 
        Ici nous allons vous apprendre à coder un site de A à Z. Et évidemment en partant de zéro. 
        Moi aussi ayant apris sur un site internet bien connu (qui a d'ailleurs changer de nom aujourd'hui RIP) 
        yant l'envie de transmettre ma passion, je me suis donc lancé dans la création de ce site !
    </p>
    <p>Pour illustrer tout ça, voici 2 manière de dire bonjour quand on est WebDev : </p>
    <pre>
        <code class="html">
                &lt;p&gt; Hello world ! &lt;/p&gt;
        </code>
        <code class="php">
                &lt;?php
                    echo "Hello world !";
                ?&gt;
        </code>
    </pre>
    <p>
        Sache qu'ici, à part lire tu n'aura rien d'autre à faire (enfin t'entrainer évidemment...). 
        Il faudra t'armer de courage et de perséverance pour arriver au bout !
    </p>
@endsection
