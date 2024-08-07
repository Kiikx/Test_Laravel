@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>{{ $creator->name }}</h2>
        </div>
        <div class="card-body">

            @if($creator->items->isEmpty())
                <p>No items found for this creator.</p>
            @else
                <h3>Item(s) created by this creator : </h3>
                <ul class="list-group mt-md-3">
                    
                    @foreach($creator->items as $item)
                        <li class="list-group-item " >
                            <a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
            
        </div>
        <div class="mx-auto">
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to Items</a>
        </div>
    </div>
</div>
@endsection