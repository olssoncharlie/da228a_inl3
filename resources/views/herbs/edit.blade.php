@extends('layouts.app')
@section('title', 'Ändra '.$herb->name)

@section('content')
<h1>Ändra {{ $herb->name }}</h1>
<div class="row">
    <div class="col-12">
        <form action="{{ route('herbs.update', ['id' => $herb->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Namn på krydda</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Kryddnamn" value="{{ $herb->name }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="image">Bild-URL</label>
                        <input required type="text" class="form-control" id="image" name="image" placeholder="URL till bilden" value="{{ $herb->image }}">
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="price">Pris</label>
                        <input required type="number" class="form-control" id="price" name="price" placeholder="Pris på kryddan" value="{{ $herb->price }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="amount">Mängd</label>
                        <input required type="number" class="form-control" id="amount" name="amount" placeholder="Mängd" value="{{ $herb->amount }}">
                    </div>
                </div>
            </div>
        
            <h6>Finns i följande butiker</h6>
            @foreach ($stores as $store)
                <div class="form-group custom-control custom-checkbox">
                    
                    <input type="checkbox" class="custom-control-input" id="store{{$store->id}}" name="stores[]" value={{$store->id}}
                        @foreach ($herbStores as $herbStore)
                            @if ($store->id == $herbStore->id)
                                checked=checked
                            @endif
                        @endforeach
                    >
                    <label class="custom-control-label" for="store{{$store->id}}">{{$store->name}}</label>
                </div>
            @endforeach
        
            <div class="form-group">
                <label for="description">Beskrivning</label>
                <textarea required class="form-control" id="description" rows="3" name="description" >{{ $herb->description }}</textarea>
            </div>
        
            <button type="submit" class="btn btn-success">Uppdatera</button>
        </form>
    </div>
</div>
<div class="pt-4">
</div>
<div class="row">
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal">
            Ta bort krydda
        </button>
      
      <!-- Modal -->
        <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="removeModalLabel">Ta bort krydda?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Är du helt säker på att du vill ta bort kryddan? Detta går inte att ångra.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Nej</button>
                        <form action="{{ route('herbs.destroy', ['id' => $herb->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ta bort</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
