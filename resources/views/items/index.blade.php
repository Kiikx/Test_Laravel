<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>

    
    <form action="{{ route('items.index') }}" method="GET">
        <label for="type">Filtrer par type :</label>
        <select name="type" id="type" onchange="this.form.submit()">
            <option value="">Tous</option>
            @foreach(App\Models\Item::TYPES as $type)
            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
            @endforeach
        </select>
    </form>


    <h1>Items</h1>
    <a href="{{ route('items.create') }}">Add item</a>

    <ul>
        @foreach ($items as $item)
            <li>
                <h2>{{ $item->name }}</h2>
                <p>{{ $item->description }}</p>
                <p>${{ $item->price }}</p>
                <p>Type: {{ $item->type }}</p>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>