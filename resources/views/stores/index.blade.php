@extends('layouts.app')
@section('title', 'Butiker')

@section('content')
@auth
    <div class="row">
        <div class="col-12">
            <a class="btn btn-success" href="{{ route('stores.create') }}" role="button">Lägg till ny butik</a>
        </div>
    </div>
@endauth

<h1>Butiker</h1>

<div class="row">
    <div class="col-md-6">
        <div class="list-group">
        @foreach ($stores as $store)
            <a href="{{ route('stores.show', ['stores' => $store->id]) }}" class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-12">
                        <h5>{{ $store->name }}</h5>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</div>
@endsection
