@extends('layouts.app')
@section('title', 'REVIEW-TITEL HÄR SENARE')

@section('content')

@auth
    // The user is authenticated...
@endauth

{{-- Lägg denna knappen i @auth sedan när det är på plats --}}
<div class="row">
    <div class="col-2">
        <a class="btn btn-primary" href="{{ route('reviews.edit', ['id' => $review->id]) }}" role="button">Ändra recension</a>
    </div>
</div>
<div class="pt-4">
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2 class="">{{ $review->name }}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $review->comment }}</p>
                <h5>Tillhör:</h5>
                <div class="list-group">
                    <a href="{{ route('herbs.show', ['id' => $herb->id]) }}" class="list-group-item list-group-item-action">{{ $herb->name }}</a>
                </div>
            </div>
            <div class="card-footer">
                <p class="font-weight-bold">Skapad:</p>
                <p>{{ $review->created_at }}</p>
                <p class="font-weight-bold">Uppdaterad:</p>
                <p>{{ $review->updated_at }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
