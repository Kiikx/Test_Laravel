@extends('layouts.app')

@section('content')
 <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>{{ $item->name }}</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{ $item->description }}</p>
                <h5 class="card-title">Price</h5>
                <p class="card-text">${{ number_format($item->price, 2) }}</p>
                <h5 class="card-title">Type</h5>
                <p class="card-text">{{ ucfirst($item->type) }}</p>
                <a href="{{ route('items.index') }}" class="btn btn-primary">Back to items</a>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection