<div class="card">
    <div class="list-group list-group-flush">
        @foreach ($reviews as $review)
            <a href="{{ route('reviews.show', ['reviews' => $review->id]) }}" class="list-group-item list-group-item-action">
                <h6>{{ $review->name }}</h6>
                <p>{{ $review->comment }}</p>
            </a>
        @endforeach
    </div>
</div>