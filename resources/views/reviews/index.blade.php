@extends('layouts.app')
@section('title', 'Recensioner')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Recensioner</h1>
        @include('components.reviews')
    </div>
</div>
@endsection
