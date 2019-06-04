@extends('layouts.app')
@section('title', 'Start')

@section('content')
    <h1>Startsida</h1>
    <p>På denna trevliga hemsida kan man kolla in lite <a href="{{ route('herbs.index') }}">kryddor</a>, 
        läsa <a href="{{ route('reviews.index') }}">recensioner</a>, 
        eller kolla in <a href="{{ route('stores.index') }}">butikerna</a>.
    </p>
    <p>För att kunna skriva recensioner och modifiera innehåll behöver man vara <a href="{{ route('login') }}">inloggad</a>.</p>
    <p>Koden för sidan finns även publicerad på <a href="https://github.com/olssoncharlie/da228a_inl3">GitHub</a>.</p>
    <h6>Skapad av:</h6>
    <p>Charlie Olsson och David Hurtig.</p>
@endsection
