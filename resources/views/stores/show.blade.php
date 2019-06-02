@extends('layouts.app')
@section('title', $store->name)

@section('content')
@auth
    // The user is authenticated...
@endauth

{{-- Lägg denna knappen i @auth sedan när det är på plats --}}
<div class="row">
    <div class="col-2">
        <a class="btn btn-primary" href="{{ route('stores.edit', ['id' => $store->id]) }}" role="button">Ändra butik</a>
    </div>
</div>
<div class="pt-4">
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2 class="">{{ $store->name }}</h2>
            </div>
            <div class="card-body">
                <h5>Address:</h5>
                <p>{{ $store->address }}</p>
                <h5>Har följande kryddor i lager:</h5>
                <div class="list-group">
                    @if ($store->herbs->isNotEmpty())
                        @foreach ($store->herbs as $herb)
                            <a href="{{ route('herbs.show', ['herbs' => $herb->id]) }}" class="list-group-item list-group-item-action">{{ $herb->name }}</a>
                        @endforeach
                    @else
                        <span class="list-group-item list-group-item-danger">Har inga kryddor i lager.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
