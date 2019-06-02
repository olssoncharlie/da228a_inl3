@extends('layouts.app')
@section('title', 'Lägg till review')

@section('content')
<h3>Lägg till review för: {{ $herb->name}}</h3>
<div class="row">
    <div class="col-12">
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" id="herb_id" name="herb_id" value="{{ $herb->id }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input disabled required type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        <input hidden required class="form-control" id="user_id" name="user_id" value="{{ $user->id }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="comment">Kommentar</label>
                        <textarea required class="form-control" id="comment" rows="3" name="comment" ></textarea>
                    </div>
                </div>
            </div>  

            <button type="submit" class="btn btn-success">Lägg till</button>
        </form>
    </div>
</div>
@endsection
