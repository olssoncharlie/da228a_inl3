@extends('layouts.app')
@section('title', 'Lägg till krydda')

@section('content')
<h1>Lägg till ny krydda</h1>
    <form action="{{ route('herbs.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Namn på krydda</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Kryddnamn">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="image">Bild-URL</label>
                    <input required type="text" class="form-control" id="image" name="image" placeholder="URL till bilden">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="price">Pris</label>
                    <input required type="number" class="form-control" id="price" name="price" placeholder="Pris på kryddan">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="amount">Mängd</label>
                    <input required type="number" class="form-control" id="amount" name="amount" placeholder="Mängd">
                </div>
            </div>
        </div>

        <h6>Finns i följande butiker</h6>
        @foreach ($stores as $store)
            <div class="form-group custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="store{{$store->id}}" name="stores[]" value="{{$store->id}}">
                <label class="custom-control-label" for="store{{$store->id}}">{{$store->name}}</label>
            </div>
        @endforeach

        <div class="form-group">
            <label for="description">Beskrivning</label>
            <textarea required class="form-control" id="description" rows="3" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lägg till</button>
    </form>
@endsection
