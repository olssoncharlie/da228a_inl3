@extends('layouts.app')
@section('title', 'Kryddor')

@section('content')

@auth
    // The user is authenticated...
@endauth

{{-- Lägg denna knappen i @auth sedan när det är på plats --}}
<div class="row">
    <div class="col-12">
        <a class="btn btn-success" href="{{ route('herbs.create') }}" role="button">Lägg till ny krydda</a>
    </div>
</div>

<h1>Kryddor</h1>

<div class="row">
    <div class="col-md-6">
        <div class="list-group">
        @foreach ($herbs as $herb)
            <a href="{{ route('herbs.show', ['herbs' => $herb->id]) }}" class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-4">
                    <img src="{{ $herb->image }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <h5>{{ $herb->name }}</h5>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        <span class="badge badge badge-primary float-right">{{ $herb->price }} SEK</span>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</div>

@endsection
