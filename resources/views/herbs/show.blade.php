@extends('layouts.app')
@section('title', $herb->name)

@section('content')

@auth
    // The user is authenticated...
@endauth

{{-- Lägg denna knappen i @auth sedan när det är på plats --}}
<div class="row">
    <div class="col-2">
        <a class="btn btn-primary" href="{{ route('herbs.edit', ['id' => $herb->id]) }}" role="button">Ändra krydda</a>
    </div>
</div>
<div class="pt-4">
</div>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2 class="">{{ $herb->name }}</h2>
            </div>
            <img class="card-img-top img-fluid img-thumbnail" src="{{ $herb->image }}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ $herb->description }}</p>
                <h5>Finns i följande butiker:</h5>
                <div class="list-group">
                    @if ($stores->isNotEmpty())
                        @foreach ($stores as $store)
                            <a href="{{ route('stores.show', ['stores' => $store->id]) }}" class="list-group-item list-group-item-action list-group-item-success">{{ $store->name }}</a>
                        @endforeach
                    @else
                        <span class="list-group-item list-group-item-danger">Finns ej tillgänglig i några butiker.</span>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <span>{{ $herb->amount }} Gram</span>
                <span class="badge badge badge-primary float-right">{{ $herb->price }} SEK</span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h4>Recensioner</h4>
        @include('components.reviews')
        @auth
            // The user is authenticated...
        @endauth

        {{-- Lägg denna knappen i @auth sedan när det är på plats --}}
        <div class="pt-4">
        </div>
        <a class="btn btn-success" href="{{ route('reviews.create', ['id' => $herb->id]) }}" role="button">Lägg till recension</a>
    </div>
</div>
@endsection
