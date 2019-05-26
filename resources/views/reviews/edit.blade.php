@extends('layouts.app')
@section('title', 'Ändra review')

@section('content')
<h1>Ändra review</h1>
<div class="row">
    <div class="col-12">
        <form action="{{ route('reviews.update', ['id' => $review->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input required type="text" class="form-control" id="name" name="name" placeholder="Username" value="{{ $review->name }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="herb">Tillhör krydda:</label>
                        <select required class="form-control" id="herb" name="herb">
                            @foreach ($herbs as $herb)
                                <option value="{{ $herb->id }}" 
                                    @if ($review_herb->id == $herb->id)
                                        selected
                                    @endif
                                >
                                {{ $herb->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="comment">Kommentar</label>
                        <textarea required class="form-control" id="comment" rows="3" name="comment" >{{ $review->comment }}</textarea>
                    </div>
                </div>
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
                Ta bort review
            </button>
          
          <!-- Modal -->
            <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="removeModalLabel">Ta bort review?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Är du helt säker på att du vill ta bort reviewn? Detta går inte att ångra.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Nej</button>
                            <form action="{{ route('reviews.destroy', ['id' => $review->id]) }}" method="POST">
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
