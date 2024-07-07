@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="row" id="items-container">
        @foreach($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->type }}</h6>
                        <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $item->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $items->links() }}
</div>
@endsection 