@extends('layouts.app')
@section('title', 'Lägg till store')

@section('content')
<h3>Lägg till ny butik</h3>
<div class="row">
    <div class="col-12">
        <form action="{{ route('stores.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Namn</label>
                        <input required type="text" class="form-control" id="name" name="name" placeholder="Namn på butik">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Adress</label>
                        <input required type="text" class="form-control" id="address" name="address" placeholder="Adress">
                    </div>
                </div>
            </div>

            <h6>Har följande kryddor i lager</h6>
            @foreach ($herbs as $herb)
                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="herb{{$herb->id}}" name="herbs[]" value="{{$herb->id}}">
                    <label class="custom-control-label" for="herb{{$herb->id}}">{{$herb->name}}</label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Lägg till</button>
        </form>
    </div>
</div>
@endsection
