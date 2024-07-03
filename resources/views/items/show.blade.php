
    <div class="container">
        <h1>{{ $item->name }}</h1>
        <p>{{ $item->description }}</p>
        <p><strong>Price:</strong> {{ $item->price }}</p>
        <p><strong>Type:</strong> {{ ucfirst($item->type) }}</p>

        <a href="{{ route('items.index') }}">Return to items</a>
    </div>
