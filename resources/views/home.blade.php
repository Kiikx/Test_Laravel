@extends('layouts.app')
@section('content')
    
<div class="container mt-5">
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
                        <p class="card-text"><strong>Type:</strong> {{ ucfirst($item->type) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
