@extends('layouts.app')
@section('title', 'Ändra '.$store->name)

@section('content')
<h3>Ändra {{ $store->name }}</h3>
<div class="row">
    <div class="col-12">
        <form action="{{ route('stores.update', ['id' => $store->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Namn</label>
                        <input required type="text" class="form-control" id="name" name="name" value="{{ $store->name }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Adress</label>
                        <input required type="text" class="form-control" id="address" name="address" value="{{ $store->address }}">
                    </div>
                </div>
            </div>

            <h6>Har följande kryddor i lager:</h6>
            @foreach ($herbs as $herb)
                <div class="form-group custom-control custom-checkbox">
                    
                    <input type="checkbox" class="custom-control-input" id="herb{{$herb->id}}" name="herbs[]" value={{$herb->id}}
                        @foreach ($store->herbs as $storeHerb)
                            @if ($herb->id == $storeHerb->id)
                                checked=checked
                            @endif
                        @endforeach
                    >
                    <label class="custom-control-label" for="herb{{$herb->id}}">{{$herb->name}}</label>
                </div>
            @endforeach

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
            Ta bort butik
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="removeModalLabel">Ta bort butik?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Är du helt säker på att du vill ta bort butiken? Detta går inte att ångra.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Nej</button>
                        <form action="{{ route('stores.destroy', ['id' => $store->id]) }}" method="POST">
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
